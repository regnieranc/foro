@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class='btn btn-primary' href="{{route('categorias.create')}}">Agregar</a>
            </div>
            <div class="col-12">
                categorias
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead class=" thead-dark">
                        <tr>
                            <th>Posición</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    @foreach($categorias as $c)
                        <tr>
                            <td>{{$c->posicion}}</td>
                            <td>{{$c->categoria}}</td>
                            <td>{{$c->descripcion}}</td>
                            <td>{{$c->created_at}}</td>
                            <td>
                            <a href="{{route('categorias.show', ['id' => $c->id])}}">
                                    <i class='fas fa-edit text-primary'></i>
                                </a>
                                <form method="post" action="{{route('categorias.delete')}}">
                                    @csrf
                                    <input name='id' type='hidden' value='{{$c->id}}' />
                                    <button type='submit'><a href="{{route('categorias.show', ['id' => $c->id])}}">
                                        <i class='fas fa-trash text-danger'></i>
                                    </a></button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection