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
                <h1><i class="fa fa-plus"></i> Incluir <small>Post</small></h1>
            </div>
            <form method="post" enctype="multipart/form-data" action="{{ route('post.salvar') }}">
                <div class="form-group">
                    @csrf
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" name="titulo"/>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status">
                        <option value="ativo" selected="">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" name="descricao"/>
                </div>
                <div class="form-group">
                    <label for="imagem">Imagem:</label>
                    <input type="file" name="imagem"/>
                </div>
                <div class="form-group">
                    <label><b>Categorias:</b></label>
                    <div id="container-grid-categoria">
                        <div class="container-grid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="grid">
                                        <select class="form-control" name="categoria[]">
                                            @foreach($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
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
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('post.index') }}" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
</div>
@endsection
