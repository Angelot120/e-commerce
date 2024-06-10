@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-xl-4"></div>
        <div class="col-xl-4">
            <h1>Modifier</h1>
            {{-- @if ($message = Session::get('error'))

            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
                
            @endif

            @if ($message = Session::get('success'))

            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div> 
                
            @endif --}}
            <img src="{{ URL::asset($product->file == '' ? 'db/images.png' : URL::asset('db/products/' . $product->file)) }}" width="100%" class="card-img-top" alt="{{ $product->name }}" width="100%">
            <br><br>    

            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <select value="category_id" class="form-select" name="category_id" required>
                    <option  selected value="">Choisir une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                <br>

                <div class="form-floating">
                    <input type="text" class="form-control" value="{{ $product->name }}" id="name" name="name" placeholder="Saisir le nom du produit ici">
                    <label for="name">Nom du produit</label>
                </div>

                <br>

                <div class="form-floating">
                    <input type="number" value="{{ $product->price }}" class="form-control" name="price" id="price" min="100" max="1000000" value="0">
                    <label for="price">Prix du produit</label>
                </div>

                <br>

                <div class="form-floating">
                    <textarea name="description" value="" id="description" placeholder="Saisir la description ici" class="form-control" rows="4" class="form-control">{{ $product->description }}</textarea><br/>
                    <label for="description">Description du produit</label>
                </div>

                <br>
                
                <div>
                    <input type="file" name="file" value="{{ $product->file }}" id="file" placeholder="Insérer un fichier" class="form-control">
                    <label for="file">Image de couverture</label>
                </div>
                <br/>



                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>

        </div>
        <div class="col-xl-4">
    </div>
        
    </div>
@endsection
