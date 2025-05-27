@extends('layouts.app')

<body style="background-color: #DCD7C9">
    <div class="d-flex">
        <x-sidebar />
        <div>
            {{-- <x-navbar /> --}}
            <!-- hero section -->
            <header class="text-center py-5">
                <div class="container">
                    <h1>Maison Sono Perfume</h1>
                    <p class="lead">Dive into a world of travel perfumes,
                        A perfume that’s both a fragrance and a statement piece.
                        Perfectly designed to be both a decoration and an on-the-go essential</p>
                </div>
            </header>

            <!-- table current orders -->
            <section id="about" class="py-5">
                <div class="container text-center table-responsive" style="max-height: 350px">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ORDER-ID</th>
                                <th scope="col">CUST-ID</th>
                                <th scope="col">PRODUCTS</th>
                                <th scope="col">QTY</th>
                                <th scope="col">TOTAL PAYMENT</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">O1</th>
                                <td>C1</td>
                                <td>Parfum Paling Wangi</td>
                                <td>4</td>
                                <td>Rp.300.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">X</button>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">O2</th>
                                <td>C2</td>
                                <td>Parfum Paling Tahan Lama</td>
                                <td>2</td>
                                <td>Rp.220.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">X</button>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">O3</th>
                                <td>C3</td>
                                <td>Parfum Travel Size</td>
                                <td>20</td>
                                <td>Rp.1.000.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">X</button>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">O4</th>
                                <td>C4</td>
                                <td>Parfum Gentong Size</td>
                                <td>1</td>
                                <td>Rp.500.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">X</button>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">O1</th>
                                <td>C1</td>
                                <td>Parfum Paling Wangi</td>
                                <td>4</td>
                                <td>Rp.300.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">X</button>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">O2</th>
                                <td>C2</td>
                                <td>Parfum Paling Tahan Lama</td>
                                <td>2</td>
                                <td>Rp.220.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">X</button>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">O3</th>
                                <td>C3</td>
                                <td>Parfum Travel Size</td>
                                <td>20</td>
                                <td>Rp.1.000.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">X</button>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">O4</th>
                                <td>C4</td>
                                <td>Parfum Gentong Size</td>
                                <td>1</td>
                                <td>Rp.500.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">X</button>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">Accept</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- <!-- about section -->
            <section id="about" class="py-5">
                <div class="container text-center">
                    <h2>About Us</h2>
                    <p>Kecap ABC adalah kecap manis yang terbuat dari bahan-bahan pilihan berkualitas tinggi. Dengan
                        rasa
                        yang
                        khas dan aroma yang menggugah selera, Kecap ABC telah menjadi pilihan utama keluarga Indonesia
                        dalam
                        menyajikan masakan lezat.</p>
                </div>
            </section> --}}



        </div>
    </div>
</body>
