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
                <a href="{{ route('products.create') }}" class="btn btn-md btn-primary mb-4" id="create-post"><i class="fas fa-fw fa-user-plus"></i> Add {{ $title_page }}</a>  
        
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Products Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                        @forelse ($product as $data)<tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->quantity }} Pcs</td>
                            <td>${{ $data->price }} USD</td>
                            <td>
                                <form action="{{ route('products.destroy', $data->id) }}" method="post">
                                    @csrf 
                                    <a class="btn btn-sm btn-primary" href="{{ route('products.edit', $data) }}">Edit</a>
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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