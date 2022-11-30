@extends('layouts.app')

@section('content2')

<div class="container">
    <div class="col-md-12">
        @if(session('error'))
            <div class="alert alert-{{session('tipo')}}" role="alert">
                {{session('error')}}
            </div>
        @endif
        <h1>Asistente a la sesion personalizada {{$personalizada->Clave_Personalizada}}</h1>
        <h2>Nombre de la sesion personalizada {{$personalizada->Nombre_Personalizada}}</h2>
        <h2>Horario de la sesion personalizada {{$personalizada->Horario_Personalizada}}</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Cliente:</th>
                <th scope="col">Nombre:</th>
                <th scope="col">Telefono:</th>
                <th scope="col">Dirección:</th>
                <th scope="col">Correo:</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $key => $cliente)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$cliente->Clave_Cliente}}</td>
                        <td>{{$cliente->Nombre_Cliente}}</td>
                        <td>{{$cliente->Telefono_Cliente}}</td>
                        <td>{{$cliente->Direccion_Cliente}}</td>
                        <td>{{$cliente->Correo_Cliente}}</td>
                    </tr>
                @endforeach
        
            </tbody>
        </table>
    </div>
</div>

@endsection