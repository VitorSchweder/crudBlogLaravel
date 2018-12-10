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
                <h1><i class="fa fa-edit"></i> Alterar <small>Categoria</small></h1>
            </div>
            <form method="post" action="{{ route('categoria.atualizar', $categoria->id) }}">
                @method('PATCH')
                <div class="form-group">
                    @csrf
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" value="{{$categoria->titulo}}" name="titulo"/>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status">
                        <option value="ativo" {{$categoria->status == 'ativo' ? 'selected' : null}}>Ativo</option>
                        <option value="inativo" {{$categoria->status == 'inativo' ? 'selected' : null}}>Inativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                <input type="text" value="{{$categoria->descricao}}" class="form-control" name="descricao"/>
                </div>
                <button type="submit" class="btn btn-primary">Alterar</button>
                <a href="{{ route('categoria.index') }}" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
</div>
@endsection
