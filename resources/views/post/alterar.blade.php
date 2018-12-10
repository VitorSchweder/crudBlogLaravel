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
                <h1><i class="fa fa-edit"></i> Alterar <small>Post</small></h1>
            </div>
            <form method="post" enctype="multipart/form-data" action="{{ route('post.atualizar', $post->id) }}">
                @method('PATCH')
                <div class="form-group">
                    @csrf
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" value="{{$post->titulo}}" name="titulo"/>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status">
                        <option value="ativo" {{$post->status == 'ativo' ? 'selected' : null}}>Ativo</option>
                        <option value="inativo" {{$post->status == 'inativo' ? 'selected' : null}}>Inativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" value="{{$post->descricao}}" name="descricao"/>
                </div>
                @if ($post->imagem_capa)
                    <div class="form-group" id="imagem-formulario">
                        <img class="img-responsive" src="{{ url("storage/posts/{$post->imagem_capa}") }}" alt="{{ $post->titulo }}">
                    </div>
                @endif
                <div class="form-group">
                    <label for="imagem">Alterar imagem:</label>
                    <input type="file" name="imagem"/>
                </div>
                <div class="form-group">
                    <label><b>Categorias:</b></label>
                    <div id="container-grid-categoria">
                        @foreach($post->categorias as $categoriaRelacionada)
                            <div class="container-grid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="grid">
                                            <select class="form-control" name="categoria[]">
                                                @foreach($categorias as $categoria)
                                                    <option value="{{$categoria->id}}" @if ($categoriaRelacionada->id == $categoria->id) {{"selected"}} @endif>{{$categoria->titulo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="remover btn btn-danger">Remover</a>
                                        <a class="adicionar btn btn-success">Adicionar</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('post.index') }}" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
</div>
@endsection
