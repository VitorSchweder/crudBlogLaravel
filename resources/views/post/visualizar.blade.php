@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif
            <div class="page-header">
                <h1><i class="fa fa-edit"></i> Visulizar <small>Post</small></h1>
            </div>

            <div class="form-group">
                <label for="titulo">Título:</label>
                {{$post->titulo}}
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                {{ucfirst($post->status)}}
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                {{$post->descricao}}
            </div>
            <div class="form-group" id="imagem-formulario">
                <img class="img-responsive" src="{{ url("storage/posts/{$post->imagem_capa}") }}" alt="{{ $post->titulo }}">
            </div>
            <div class="form-group">
                <label><b>Categorias:</b></label>
                <div id="container-grid-categoria">
                    @foreach($post->categorias as $categoriaRelacionada)
                        <div class="container-grid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="grid">
                                        {{$categoriaRelacionada->titulo}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('post.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
</div>
@endsection
