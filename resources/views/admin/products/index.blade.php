@extends('layouts.app')

@section('konten')
    
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Halaman {{ $title }}</h1>
        
        {{-- @if(auth()->user()->is_admin) --}}
        <a href="/products/create" class="btn btn-md btn-primary mb-4"><i class="fas fa-fw fa-user-plus"></i> Tambah {{ $title }}</a>  
        {{-- @endif --}}

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Barang</th>
                                <th>quan</th>
                                <th>price</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->price }}</td>
                                <td>
                                    <form action="/products/{{ $data->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-sm btn-primary" href="{{ route('products.edit', $data) }}">Edit</a>
                                        <a class="btn btn-sm btn-danger delete" id="{{ $data->id }}">Hapus</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

@endsection