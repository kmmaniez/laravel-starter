@extends('layouts.master')

@section('konten')
    
    <div class="container-fluid">
        <!-- Page Heading -->
        <x-admin.page-heading>{{ $title_page }}</x-admin.page-heading>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form {{ $title_page }}</h6>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="card-body">

                        <form action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="row d-block">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Tittle</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="price">Slug</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" id="price">
                                        @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="content">Category</label>
                                        <select name="" id="" class="form-control">
                                            <option value="0">-- Choose category --</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control" name="content" id="content" rows="5"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="photo" class="form-label">Images</label>
                                        <input type="file" name="photo" id="photo" class="form-control">
                                    </div>
                                </div>
                                
                            </div>
                            <x-admin.button-primary>Save Post</x-admin.button-primary>
                        </form>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection