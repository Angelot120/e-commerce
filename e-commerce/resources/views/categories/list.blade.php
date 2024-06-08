@extends('layout.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Liste des Catégories</h1>
            </div>
        </div>
        <a href="{{ route("category.create") }}" class="btn btn-primary">Créer une catégorie</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="row mt-5">
            
            @foreach ($categories as $category )
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                
                    <div class="alert alert-success">
                        <p>{{ $category->name }}</p>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Modifier</a>
                        <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger" onclick="return confirm('Êtes vous sûre de vouloir supprimer cette catégorie? ')">Supprimer</a>
                    </div>
                    </div>
            @endforeach
            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
            </div>
        </div>
    </div>
@endsection