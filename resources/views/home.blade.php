@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Seja bem vindo {{auth()->user()->name}}</h2>
        </div>
    </div>
</div>
@endsection
