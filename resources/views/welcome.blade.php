@extends('template.main')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Bienvenue dans l'album photo</h1>
        <div class="mt-5">
            <form action="/album " method="post" enctype="multipart/form-data">
                @csrf
                <label for="nom">
                    nom:
                    <input type="text" name="nom" id="nom">
                </label>
                <label for="auteur">
                    auteur:
                    <input type="text" name="auteur" id="auteur">
                </label>
                <label for="url">
                    image:
                    <input type="file" name="url" id="url">
                </label>
                <button class="btn btn-warning" type="submit">ajouter</button>
            </form>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($album as $item)
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('images/'. $item->photo->url)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$item->nom}}</h5>
                    <p class="card-text">{{$item->auteur}}</p>
                    <a href="#" class="btn btn-primary">edit</a>
                    <form action="album/{{$item->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">DESTROY</button>
                    </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection