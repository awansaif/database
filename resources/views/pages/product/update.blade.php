@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ Route('product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active"> Update Product</li>
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
        <div class="row">
            <div class="col-sm-8">
                <form method="POST" action="{{ Route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="ARTICOLO">ARTICOLO</label>
                        <input type="text" class="form-control @error('article') is-invalid @enderror" name="article"
                            placeholder="ARTICOLO" value="{{ $product->article }}" required onfocus>
                        @error('article')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            accept="image/*">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="DESCRIZIONE">DESCRIZIONE</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            cols="30" rows="5" required>{{ $product->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="TAGLI">TAGLI</label>
                        <input type="text" class="form-control @error('cuts') is-invalid @enderror" name="cuts"
                            placeholder="TAGLI" required value="{{ $product->cuts }}">
                        @error('cuts')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="PREZZO">PREZZO</label>
                        <input type="decimal" class="form-control @error('price') is-invalid @enderror" name="price"
                            placeholder="PREZZO" value="{{ $product->price }}" required>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
            <div class="col-sm-4 p-2">
                <h2 class="text-center">Product Image</h2>
                <img src="{{ $product->image }}" alt="" width="100%" height="300px">
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
