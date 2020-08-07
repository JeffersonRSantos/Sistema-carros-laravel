@extends('templates.default')

@section('content')
<h1 class="display-4">Atualizar</h1>
<hr class="my-4">
<form action="{{ route('carros.update', $dados['id']) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="modelo">Modelo:</label>
        <input type="text" class="form-control" name="modelo" value="{{ $dados['modelo'] }}" required>
      </div>
      <div class="form-group">
        <label for="marca">Marca:</label>
        <select class="form-control" name="marca" id="marca" required>
            <option value="{{ $dados['marca'] }}" selected>{{ $dados['marca'] }}</option>
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
        <input type="number" class="form-control" name="ano" value="{{ $dados['ano'] }}" required>
      </div>
    
        <input type="submit" class="btn btn-success" value="Salvar">
</form>
<hr class="my-4">
<a href="{{ route('carros.index') }}"><button type="button" class="btn btn-primary"><< Voltar</button></a>
@endsection