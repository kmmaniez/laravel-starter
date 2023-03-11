@extends('layouts.app')

@section('konten')
    
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ $title_page }} Page</h1>
        
        {{-- @if(auth()->user()->is_admin) --}}
        {{-- @endif --}}

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List {{ $title_page }}</h6>
            </div>
            <div class="card-body">
                <a href="/products/create" class="btn btn-md btn-primary mb-4"><i class="fas fa-fw fa-user-plus"></i> Add {{ $title_page }}</a>  
        
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>URL Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <form action="/products/{{ $category->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-sm btn-primary" href="{{ route('post.edit', $category) }}">Edit</a>
                                        <a class="btn btn-sm btn-danger delete" id="{{ $category->id }}">Delete</a>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="5"><i>There's no records, please create new record.</i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

@endsection