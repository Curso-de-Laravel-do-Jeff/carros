@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Editar Carro</h1>
        <hr/>

        <div class="row">
            <div class="col-sm-12">
                {!! Form::open(['route' => ['cars.update', $car->_id], 'method' => 'put']) !!}
                @include('cars._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('.form-error').each(function (index) {
            $.notify({message: $(this).text()}, {type: 'danger'});
        });
    </script>
@stop
