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
                <a href="javascript:void(0)" class="btn btn-md btn-primary mb-4" id="create-post"><i class="fas fa-fw fa-user-plus"></i> Add {{ $title_page }}</a>  
        
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table">
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="#" id="edit-post" data-id="{{ $category->id }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" id="delete-post" data-id="{{ $category->id }}" class="btn btn-danger btn-sm">Delete</a>
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