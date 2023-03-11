@extends('layouts.app')

@section('konten')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-5 text-gray-800">{{ $title_page }} Page</h1>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title_page }}</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <form action="" method="post">
                            @method('put')
                            @csrf

                            <div class="row d-block">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Products</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" class="form-control" min="1" name="price" id="price" value="{{ old('price', $product->price) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" class="form-control" min="1" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-md">Change Product</button>
                            <a class="btn btn-default btn-md text-decoration-none" href="/products">Back</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection