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

                        <form action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row d-block">

                                <div class="col-lg-12">

                                    <div class="row">

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}">
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
                                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
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
                                        <select name="category_id" id="category_id" class="form-control form-select">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}" {{ $category->id === $post->category->id ? 'selected' : '' }}>{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5">{{ old('content', $post->content) }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="image" class="form-label">Images</label>
                                        <input type="file" name="image" id="image" class="form-control mb-3 @error('image') is-invalid @enderror" onchange="previewImage()">
                                        
                                        <div class="row">
                                            <div class="col">
                                                <p>Image before</p>
                                                <img src="{{ asset('storage/post-image/' . $post->image) }}" name="oldImage" class="img-fluid mb-3">
                                            </div>
                                            <div class="col">
                                                <p><strong>Image After</strong></p>
                                                <img class="img-preview img-fluid mb-3" id="img-preview">
                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <x-admin.button-primary id="save_post">Update Post</x-admin.button-primary>
                            <a class="btn btn-default btn-md" href="{{ route('post.index') }}">Back</a>
                        </form>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection