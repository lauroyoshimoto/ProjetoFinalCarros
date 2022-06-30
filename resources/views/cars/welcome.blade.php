@extends('cars.layout')

@section('title','Lauro Multimarcas')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um carro</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="cars-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Nossos carros</h2>
    <p class="subtitle">Veja os carros mais tops</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($cars as $car)
        <div class="card col-md-3">
            <img src="/img/cars/{{ $car->image }}" alt="{{ $car->model}}">
            <div class="card-body">
                <p class="card-date">{{ $car->year }}</p>
                <h5 class="card-title">{{ $car->model }}<h5>
                <a href="/{{ $car->id}}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($cars) == 0 && $search)
            <p>Não foi possível encontrar nenhum carro com {{ $search }}! <a href='/'>Ver todos</a></p>
        @elseif(count($cars) == 0)
            <p>Não há carros disponíveis</p>
        @endif
    </div>
</div>
      
@endsection