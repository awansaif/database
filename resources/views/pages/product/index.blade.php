@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ Route('product.create') }}" class="btn btn-success float-right">Add Product</a>
        <br>
        <br>
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <table id="datatable" class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>ARTICOLO</th>
                    <th>DESCRIZIONE</th>
                    <th>TAGLI</th>
                    <th>PREZZO</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="{{ $product->image }}" alt="" width="150px" height="150px">
                    </td>
                    <td>{{ $product->article }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->cuts }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ Route('product.edit',$product->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ Route('product.destroy',$product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>ARTICOLO</th>
                    <th>DESCRIZIONE</th>
                    <th>TAGLI</th>
                    <th>PREZZO</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection


@section('scripts')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $("#datatable").DataTable();
    });
</script>
@endsection
