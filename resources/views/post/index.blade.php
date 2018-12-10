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
                <h1><i class="fa fa-clipboard"></i> Listar <small>Posts</small></h1>
            </div>
            <div class="margem-inferior-10">
                <a href="{{ route('post.incluir') }}" class="btn btn-primary">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    Incluir
                </a>
            </div>
            <div class="container-filtros">
                <form method="post" action="{{ route('post.pesquisar') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nome do post:</label>
                        <input type="text" name="titulo" value="{{$titulo}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Filtrar</button>
                    </div>
                </form>
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
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->titulo}}</td>
                            <td>{{ucfirst($post->status)}}</td>
                            <td>{{$post->descricao}}</td>
                            <td class="acoes">
                                <a title="Alterar" href="{{ route('post.alterar',$post->id)}}" class="btn btn-primary">Alterar</a>
                                <a title="Visualizar" href="{{ route('post.visualizar',$post->id)}}" class="btn btn-info">Visualizar</a>
                                <form action="{{ route('post.excluir', $post->id)}}" method="post">
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
