<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function addToKeranjang(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $price = $request->get('price');
        $quantity = $request->get('quantity', 1);
        
        // Jika user login, simpan ke database
        if (Auth::check()) {
            $existing = Keranjang::where('pelanggan_id', Auth::id())
                                ->where('produk_id', $id)
                                ->first();
            
            if ($existing) {
                $existing->kuantitas += $quantity;
                $existing->save();
            } else {
                Keranjang::create([
                    'pelanggan_id' => Auth::id(),
                    'produk_id' => $id,
                    'kuantitas' => $quantity
                ]);
            }
        } else {
            // Jika tidak login, simpan ke session
            $keranjang = session()->get('keranjang', []);
            
            if(isset($keranjang[$id])) {
                $keranjang[$id]['quantity'] += $quantity;
            } else {
                $keranjang[$id] = [
                    'id' => $id,
                    'name' => $name,
                    'price' => $price,
                    'quantity' => $quantity
                ];
            }
            
            session()->put('keranjang', $keranjang);
        }
        
        return redirect()->route('keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
    
    public function index()
    {
        $cartItems = [];
        $cartTotal = 0;
        
        if (Auth::check()) {
            // Ambil dari database
            $keranjangItems = Keranjang::with('produk')
                                    ->where('pelanggan_id', Auth::id())
                                    ->get();
            
            foreach ($keranjangItems as $item) {
                $cartItems[] = [
                    'id' => $item->produk_id,
                    'name' => $item->produk->nama,
                    'price' => $item->produk->harga,
                    'quantity' => $item->kuantitas,
                    'image' => $item->produk->gambar,
                    'category' => $item->produk->kategori ?? ''
                ];
                $cartTotal += $item->produk->harga * $item->kuantitas;
            }
        } else {
            // Ambil dari session
            $keranjang = session()->get('keranjang', []);
            
            foreach ($keranjang as $item) {
                $produk = Produk::find($item['id']);
                if ($produk) {
                    $cartItems[] = [
                        'id' => $item['id'],
                        'name' => $produk->nama,
                        'price' => $produk->harga,
                        'quantity' => $item['quantity'],
                        'image' => $produk->gambar,
                        'category' => $produk->kategori ?? ''
                    ];
                    $cartTotal += $produk->harga * $item['quantity'];
                }
            }
        }
        
        return view('keranjang', compact('cartItems', 'cartTotal'));
    }
    
    public function updateQuantity(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        
        if (Auth::check()) {
            $item = Keranjang::where('pelanggan_id', Auth::id())
                        ->where('produk_id', $id)
                        ->first();
            
            if ($item) {
                if ($quantity > 0) {
                    $item->kuantitas = $quantity;
                    $item->save();
                } else {
                    $item->delete();
                }
            }
        } else {
            $keranjang = session()->get('keranjang');
            
            if ($quantity > 0) {
                $keranjang[$id]['quantity'] = $quantity;
            } else {
                unset($keranjang[$id]);
            }
            
            session()->put('keranjang', $keranjang);
        }
        
        return redirect()->route('keranjang');
    }
    
    public function removeItem($id)
    {
        if (Auth::check()) {
            Keranjang::where('pelanggan_id', Auth::id())
                ->where('produk_id', $id)
                ->delete();
        } else {
            $keranjang = session()->get('keranjang');
            
            if(isset($keranjang[$id])) {
                unset($keranjang[$id]);
                session()->put('keranjang', $keranjang);
            }
        }
        
        return redirect()->route('keranjang')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}