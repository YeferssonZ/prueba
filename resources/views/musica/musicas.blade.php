@extends('layouts.app')

@section('content')
<main>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <div class="album py-5 bg-light">
        <div class="container">
            <form action="{{ route('subirMusica') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <label for="staticEmail2">Subir Musica</label>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre música - Artista</label>
                    <input type="text" class="form-control" name="nombre_musica" placeholder="Agregue el nombre">
                </div>
                <div class="col-auto">
                    <input class="form-control" type="file" name="musica">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Subir</button>
                </div>
            </form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($musicas as $musica)
                <div class="col">
                    <div class="card shadow-sm">
                        <img height="200" src="/musica/{{$musica->ruta}}" alt="Imagen">
                        <div class="card-body">
                            <p class="card-text">{{$musica->nombre_musica}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="POST" action="{{ route('eliminarMusica') }}">
                                    @csrf
                                    <div class="btn-group">
                                        <input type="hidden" name="id_musica" value="{{$musica->id}}">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Eliminar</button>
                                    </div>
                                </form>
                                <small class="text-muted">{{$musica->created_at}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</main>
@endsection