@extends('templates.default')

@section('content')
<h1 class="display-4">Cadastrar Novo</h1>
<hr class="my-4">
<form action="{{ route('carros.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="modelo">Modelo:</label>
        <input type="text" class="form-control" name="modelo" required>
      </div>
      <div class="form-group">
        <label for="marca">Marca:</label>
        <select class="form-control" name="marca" id="marca" required>
            <option disabled selected>Selecione: </option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Volkswagen">Volkswagen</option>
            <option value="Fiat">Fiat</option>
            <option value="Renault">Renault</option>
            <option value="Ford">Ford</option>
            <option value="Toyota">Toyota</option>
            <option value="Hyundai">Hyundai</option>
            <option value="Jeep">Jeep</option>
            <option value="Honda">Honda</option>
            <option value="Nissan">Nissan</option>
            <option value="Citroën">Citroën</option>
            <option value="Mitsubishi">Mitsubishi</option>
            <option value="Peugeot">Peugeot</option>
            <option value="Chery">Chery</option>
            <option value="BMW">BMW</option>
            <option value="Mercedes-Benz">Mercedes-Benz</option>
            <option value="Kia">Kia</option>
            <option value="Audi">Audi</option>
            <option value="Volvo">Volvo</option>
            <option value="Land Rover">Land Rover</option>
        </select>
      </div>
      <div class="form-group">
        <label for="modelo">Ano:</label>
        <input type="number" class="form-control" name="ano" required>
      </div>
    
        <input type="submit" class="btn btn-success" value="Cadastrar Carro">
</form>
<hr class="my-4">
<a href="{{ route('carros.index') }}"><button type="button" class="btn btn-primary"><< Voltar</button></a>
@endsection