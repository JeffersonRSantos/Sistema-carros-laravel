@extends('templates.default')
@section('content')

<div class="row padding">
    <div class="col-lg-6 text-center">
        <h1 class="display-4">Seja bem vindo!</h1>
    </div>
    <div class="col-lg-6 text-center">
        <a href="{{ route('carros.create') }}"><button type="button" class="btn btn-success btn-lg btn-block">Cadastrar Novo</button></a>
    </div>
  </div>


<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">*</th>
            <th scope="col">Modelo</th>
            <th scope="col">Marca</th>            
            <th scope="col">Ano</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($getJson))
        @foreach ($getJson as $item)
            <tr>
                <td><img width="30" src="{{ asset('assets/img/icon-car.png') }}" alt="Carro"></td>
                <td>{{ $item['modelo'] }}</td>
                <td>{{ $item['marca'] }}</td>                
                <td>{{ $item['ano'] }}</td>
                <td>
                    <ul class="ul-inline">
                        <li><a href="{{ route('carros.show', $item['id']) }}"><button type="button" class="btn btn-info">Detalhes</button></a></li>
                        <li><a href="{{ route('carros.edit', $item['id']) }}"><button type="button" class="btn btn-primary">Editar</button></a></li>
                        <li><form action="{{ route('carros.destroy', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Excluir">
                        </form></li>
                    </ul>
                </td>             
            </tr>
        @endforeach            
        @else
            <tr><td><p class="red">Não existe nenhum carro! Adicione um no botão verde acima.</p></td></tr>
        @endif        
    </tbody>
</table>

@endsection