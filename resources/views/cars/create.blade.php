@extends('cars.layout')

@section('title', 'Criar Carro')

@section('content')

<div id="car-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu carro</h1>
    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="image">Imagem do carro:</label>
            <input type="file" id="image" name="image" class="from-control-file">
        </div>
        <div class="form-group mb-2">
            <label for="title">Marca:</label>
            <select name="make_id" class="form-control">
                @foreach($makes as $make)
                    <option value="{{ $make->id }}">{{ $make->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="title">Modelo:</label>
            <input type="text" class="form-control" id="model" name="model" placeholder="Modelo do carro">
        </div>
        <div class="form-group mb-2">
            <label for="date">Ano do carro:</label>
            <input type="number" class="form-control" id="year" name="year" placeholder="1987" >
        </div>
        <div class="form-group mb-2">
            <label for="title">Valor:</label>
            <input type="number" class="form-control" id="value" name="value" placeholder="99.999">
        </div>

        <input type="submit" class="btn btn-primary" id="title" value="Criar carro">
    </form>
</div>

@endsection