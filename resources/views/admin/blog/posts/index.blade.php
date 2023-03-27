@extends('layouts.master')

@section('konten')
    
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <x-admin.page-heading>{{ $title_page }}</x-admin.page-heading>

        <!-- Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List {{ $title_page }}</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('post.create') }}" class="btn btn-md btn-primary mb-4"><i class="fas fa-fw fa-user-plus"></i> Add {{ $title_page }}</a>  
        
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td><span class="badge badge-primary px-2 py-2">{{ $post->slug }}</span></td>
                                <td>{{ $post->category->name }}</td>
                                <td style="width: 200px"><img src="{{ asset('storage/post-image/' . $post->image) }}" class="img-fluid" alt=""></td>
                                <td>{{ $post->author }}</td>
                                <td>
                                    <form action="/blog/post/{{ $post->slug }}" method="post">
                                        <a class="btn btn-sm btn-success" href="#">Print PDF</a>
                                        <a class="btn btn-sm btn-secondary" href="{{ route('post.show', $post) }}">Detail</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('post.edit', $post) }}">Edit</a>
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="6"><i>There's no records, please create new record.</i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

@endsection