@extends('layouts.app')
@section('titulo', 'Listado Comentarios')
@section('contenido')

<div class="container">
@auth
@if(session('usuario')->admin)
@include('layouts.navdashboard')
@endif
@endauth
    <div class="row text-center">
        <div class="col-12 mb-5">
            <h1 class="tituloOpiniones">Opiniones  <span class="float-end fw-light totalComments">Total : {{$total_comments}}</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @forelse ($comments as $comment)
            <div @if($loop->index < 4) class="card mb-3" @elseif($loop->index > 4 and $loop->index % 2 == 0) class="card mb-3 scroll-content fadeRight" @else class="card mb-3 scroll-content fadeLeft" @endif>
                <div class="card-header">
                    {{ $comment->titulo ?? 'Sín titulo' }}
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $comment->contenido }}</p>
                        <footer class="blockquote-footer">{{ $comment->users->name ?? 'Anónimo' }} <cite title="Source Title"></cite></footer>
                    </blockquote>
                    @auth
                    @if(session('usuario')->id == $comment->user_id or session('usuario')->admin)
                    <button type="button" class="btn btn-warning btn-sm float-end mx-1" data-bs-toggle="modal" data-bs-target="#commentModal-{{ $comment->id }}">
                        Editar
                    </button>
                    @endif
                    @if(session('usuario')->admin)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-end">Eliminar</button>
                    </form>
                    @endif
                    @endauth
                </div>
            </div>
            @empty
            <p>No hay ningún comentario.</p>
            @endforelse

        </div>
    </div>
    @auth
    <section id="contacto" class="seccion full-gray">
        <div class="container">
            <h3 class="text-center">Tú opinion</h3>
            <p class="text-center"><em>Déjanos un comentario</em></p>
            <br>
            <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 mx-auto">
                        <div class="row mb-3">
                            <div class="col-12">
                                <input class="form-control" id="titulo" name="titulo" placeholder="Titulo" type="text" required>
                                @if ($errors->has('titulo'))
                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('titulo') }}</div>
                                @endif
                            </div>
                        </div>
                        <textarea class="form-control" id="contenido" name="contenido" placeholder="Su opinion..." rows="7"></textarea>
                        @if ($errors->has('contenido'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('contenido') }}</div>
                        @endif
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary d-block mx-auto" type="submit">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @endauth
    @foreach ($comments as $comment)
    <div class="modal fade" id="commentModal-{{ $comment->id }}" tabindex="-1" aria-labelledby="commentModalLabel-{{ $comment->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="commentModalLabel">Editar comentario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cotainer">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        @isset($comment)
                                        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-offset-2 col-md-8 mx-auto">
                                                    <div class="row mb-3">
                                                        <div class="col-12">
                                                            <input class="form-control" id="titulo" name="titulo" placeholder="Titulo" type="text" @if(isset($comment) && $comment->titulo) value="{{ old('titulo', $comment->titulo) }}" @endif required>
                                                            @if ($errors->has('titulo'))
                                                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('titulo') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <textarea class="form-control" id="contenido" name="contenido" placeholder="Su opinion..." rows="7">{{ $comment->contenido }}</textarea>
                                                    @if ($errors->has('contenido'))
                                                    <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('contenido') }}</div>
                                                    @endif
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-primary float-end" type="submit">Enviar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection