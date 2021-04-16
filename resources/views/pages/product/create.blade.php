@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ Route('product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active"> Add Product</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <form method="POST" action="{{ Route('product.store') }}">
            @csrf

            <div class="form-group">
                <label for="ARTICOLO">ARTICOLO</label>
                <input type="text" class="form-control @error('article') is-invalid @enderror" name="article"
                    placeholder="ARTICOLO" value="{{ old('article') }}" required onfocus>
                @error('article')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="DESCRIZIONE">DESCRIZIONE</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30"
                    rows="5" required>{{ old('description') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="TAGLI">TAGLI</label>
                <input type="text" class="form-control @error('cuts') is-invalid @enderror" name="cuts"
                    placeholder="TAGLI" required value="{{ old('cuts') }}">
                @error('cuts')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="PREZZO">PREZZO</label>
                <input type="decimal" class="form-control @error('price') is-invalid @enderror" name="price"
                    placeholder="PREZZO" value="{{ old('price') }}" required>
                @error('PREZZO')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
