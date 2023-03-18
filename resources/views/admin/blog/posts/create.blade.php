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

                        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-block">

                                <div class="col-lg-12">

                                    <div class="row">

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                                @error('title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}">
                                                @error('slug')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    
                                </div>

                                

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="content">Category</label>
                                        <select name="category" id="category" class="form-control form-select">
                                            <option style="display: none;">-- Choose category --</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
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
                                        <label for="thumbnail" class="form-label">Images</label>
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" onchange="previewImage()">
                                        @error('thumbnail')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <x-admin.button-primary id="save_post">Save Post</x-admin.button-primary>
                            <a class="btn btn-default btn-md" href="{{ route('post.index') }}">Back</a>
                        </form>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection