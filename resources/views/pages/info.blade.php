@extends('templates.default')

@section('content')

@if (!empty($dados))
<div class="jumbotron">
    <h1 class="display-4">Informações do carro</h1>
    <ul class="list-group">
        <li class="list-group-item">ID: {{ $dados['id'] }}</li>
        <li class="list-group-item">Marca: {{ $dados['marca'] }}</li>
        <li class="list-group-item">Modelo: {{ $dados['modelo'] }}</li>
        <li class="list-group-item">Ano: {{ $dados['ano'] }}</li>          
    </ul>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="{{ route('carros.index') }}" role="button"><< Voltar</a>
</div>
@else

<div class="jumbotron">
    <h1 class="display-4"> Nenhum dado encontrado!</h1>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="{{ route('carros.index') }}" role="button"><< Voltar</a>
</div>

@endif

    
@endsection