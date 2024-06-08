@extends('layout.base')

@section('content')
    <h1>Liste produits</h1>
    <a href="{{ route('product.create') }}" class="btn-primary">Créer un produit</a>

<br><br><br><br><br>

@if ($message = Session::get('success'))

    <div class="alert alert-success">
        {{ $message }}
    </div>
    
@endif

<div class="container-fluid row">
    @foreach ($products as $product)
        <div class="card mt-3 me-3">
            <img src="" width="100%" class="card-img-top" alt="">
            <div class="card-body">
                <h2 class="">{{ $product->name }}</h2>
                <p><b class="text-danger">{{ $product->price }}</b> <b>FCFA</b></p>
                <p class="">{{ $product->description }}</p>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Modifier</a>
                <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger" onclick="return confirm('Voulez vous supprimer {{ $product->name }} ?')">Supprimer</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
