@extends('cars.layout')

@section('title', 'Editando: ' . $car->model)

@section('content')

<div id="car-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $car->model }}</h1>
    <form action="/update/{{ $car->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="image">Imagem do carro:</label>
            <input type="file" id="image" name="image" class="from-control-file">
            <img src="/img/cars/{{ $car->image }}" alt="{{ $car->model }}" class="img-preview">
        </div>
        <div class="form-group mb-2">
            <label for="title">Marca:</label>
            <select name="make_id" class="form-control" value="{{ $car->make_id }}">
                @foreach($makes as $make)
                    <option value="{{ $make->id }}" {{ $car->make_id == $make->id ? 'selected' : '' }}>
                        {{ $make->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="title">Modelo:</label>
            <input type="text" class="form-control" id="model" name="model" placeholder="Modelo do carro" value="{{ $car->model }}">
        </div>
        <div class="form-group mb-2">
            <label for="date">Ano do carro:</label>
            <input type="number" class="form-control" id="year" name="year" placeholder="1987" value="{{ $car->year }}" >
        </div>
        <div class="form-group mb-2">
            <label for="title">Valor:</label>
            <input type="number" class="form-control" id="value" name="value" placeholder="99.999" value="{{ $car->value }}">
        </div>
        <input type="submit" class="btn btn-primary" id="title" value="Editar carro">
    </form>
</div>

@endsection