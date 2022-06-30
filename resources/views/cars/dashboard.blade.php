@extends('cars.layout')

@section('title','Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Carros</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-cars-container">
    @if(count($cars) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td scope="row">{{ $car->id }}</td>
                <td>{{ $car->make->name }}</td>
                <td><a href="/{{ $car->id }}">{{ $car->model }}</a></td>
                <td>R${{ $car->value }}</td>
                <td class="d-flex">
                    <a href="/edit/{{ $car->id }}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon> Editar
                    </a>
                    <form action="/{{ $car->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit' class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> Deletar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem carros, <a href="//create">criar carro</a></p>
    @endif
</div>

@endsection