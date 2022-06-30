@extends('cars.layout')

@section('title', $car->model)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/cars/{{ $car->image }}" class="img-fluid" alt="{{ $car->model }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $car->model }}</h1>
                <h2>R${{ $car->value }}</h2>
            </div>
        </div>
    </div>

@endsection


