@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Carro: {{ $car->model }}</h1>
        <hr/>

        <div class="row justify-content-center">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <th>Marca</th>
                        <td>{{ $car->brand }}</td>
                    </tr>

                    <tr>
                        <th>Modelo</th>
                        <td>{{ $car->model }}</td>
                    </tr>

                    <tr>
                        <th>Ano</th>
                        <td>{{ $car->year }}</td>
                    </tr>

                    <tr>
                        <th>Cor</th>
                        <td>{{ $car->color }}</td>
                    </tr>

                    <tr>
                        <th>Valor (U$)</th>
                        <td>{{ \App\Helpers\MoneyHelper::formatMoney($car->value ?? '') }}</td>
                    </tr>
                </tbody>
            </table>

            <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg"><i class="fa fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
@endsection
