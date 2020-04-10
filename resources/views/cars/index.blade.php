@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Carros</h1>
    <hr/>

    <a href="{{ route('cars.create') }}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Cadastrar Carro</a>

    <hr/>

    <div class="row justify-content-center">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Ano</th>
                    <th class="text-center">Cor</th>
                    <th class="text-center">Valor (U$)</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>
                @forelse($cars as $car)
                    <tr>
                        <td class="text-center">{{ $car->brand }}</td>
                        <td class="text-center">{{ $car->model }}</td>
                        <td class="text-center">{{ $car->year }}</td>
                        <td class="text-center">{{ $car->color }}</td>
                        <td class="text-center">{{ \App\Helpers\MoneyHelper::formatMoney($car->value ?? '-') }}</td>
                        <td style="width: 1%" nowrap="">
                            <a href="{{ route('cars.show', $car->_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                            &nbsp;
                            <a href="{{ route('cars.edit', $car->_id) }}" class="btn btn-light btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;
                            <a href="#" class="btn btn-danger btn-sm btn-del" data-id="{{ $car->_id }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Não Há Dados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        $('.btn-del').on('click', function (e) {
            e.preventDefault();
            if (confirm('Deseja deletar?')) {
                $.ajax({
                    contentType: 'application/x-www-form-urlencoded',
                    method: 'DELETE',
                    url: 'http://localhost:8080/api/cars/delete/' + $(this).data('id'),
                    headers: {
                        Authorization: $('meta[name="api-token"]').attr('content')
                    },
                    timeout: 0,
                    success: function (response) {
                        location.reload();
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    </script>
@stop
