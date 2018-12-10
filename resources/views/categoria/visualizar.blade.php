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
                <h1><i class="fa fa-eye"></i> Visualizar <small>Categoria</small></h1>
            </div>
            <div class="form-group">
                <label for="titulo">Título:</label>
                {{$categoria->titulo}}
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                {{ucfirst($categoria->status)}}
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                {{$categoria->descricao}}
            </div>
            <a href="{{ route('categoria.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
</div>
@endsection
