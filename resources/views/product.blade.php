@extends('layouts.app')

<body style="background-color: #DCD7C9">
    <div class="d-flex">
        <x-sidebar />
        <div>
            <header class="text-center py-5">
                <div class="container">
                    <h1>Our Products</h1>
                    <p class="lead">Explore our collection of Maison Sono Perfumes — elegant, compact, and uniquely crafted fragrances.</p>
                </div>
            </header>

            <section class="py-4">
                <div class="container table-responsive text-center">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">PRODUCT-ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">TYPE</th>
                                <th scope="col">SIZE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">STOCK</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">P01</th>
                                <td>Parfum Paling Wangi</td>
                                <td>Floral</td>
                                <td>30ml</td>
                                <td>Rp.75.000</td>
                                <td>50</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">P02</th>
                                <td>Parfum Tahan Lama</td>
                                <td>Woody</td>
                                <td>50ml</td>
                                <td>Rp.110.000</td>
                                <td>30</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">P03</th>
                                <td>Parfum Travel Size</td>
                                <td>Citrus</td>
                                <td>10ml</td>
                                <td>Rp.25.000</td>
                                <td>100</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">P04</th>
                                <td>Parfum Gentong Size</td>
                                <td>Musk</td>
                                <td>500ml</td>
                                <td>Rp.500.000</td>
                                <td>10</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</body>
