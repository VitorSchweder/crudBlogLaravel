@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}
                </div><br />
            @endif
            <div class="page-header">
                <h1><i class="fa fa-list"></i> Listar <small>Categorias</small></h1>
            </div>
            <div class="margem-inferior-10">
                <a href="{{ route('categoria.incluir') }}" class="btn btn-primary">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    Incluir
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Título</td>
                    <td>Status</td>
                    <td>Descrição</td>
                    <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->titulo}}</td>
                            <td>{{ucfirst($categoria->status)}}</td>
                            <td>{{$categoria->descricao}}</td>
                            <td class="acoes">
                                <a title="Alterar" href="{{ route('categoria.alterar',$categoria->id)}}" class="btn btn-primary">Alterar</a>
                                <a title="Visualizar" href="{{ route('categoria.visualizar',$categoria->id)}}" class="btn btn-info">Visualizar</a>
                                <form action="{{ route('categoria.excluir', $categoria->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" title="Excluir" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
