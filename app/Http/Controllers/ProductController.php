<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function view()
    {
        $products = Product::all();
        return view('landing', ['products' => $products]);
    }

    public function create(Request $request)
    {
        // dd($Request); 
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filename = time() . '_' . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('uploads/products', $filename, 'public');
            $data['photo'] = $path;
        }

        $newProduct = Product::create($data);

        return redirect(route('product.view'));
    }
}
