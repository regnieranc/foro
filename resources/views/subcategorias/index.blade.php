@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class='btn btn-primary' href="{{route('subcategorias.create')}}">Agregar</a>
            </div>
            <div class="col-12">
                Subcategorías
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead class=" thead-dark">
                        <tr>
                            <th>Posición</th>
                            <th>Categoría</th>
                            <th>Subcategorias</th>
                            <th>Path</th>
                            <th>Descripción</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    @foreach($subcategorias as $s)
                        <tr>
                            <td>{{$s->posicion}}</td>
                            <td>{{$s->categoria->categoria}}</td>
                            <td>{{$s->subcategoria}}</td>
                            <td>{{$s->path_url}}</td>
                            <td>{{$s->descripcion}}</td>
                            <td>{{$s->created_at}}</td>
                            <td>
                            <a href="{{route('subcategorias.show', ['id' => $s->id])}}">
                                    <i class='fas fa-edit text-primary'></i>
                                </a>
                                <form method="post" action="route('subcategorias.show', ['id' => $s->id])">
                                    @csrf
                                    <input name='id' type='hidden' value='{{$s->id}}' />
                                    <button type='submit'><a href="">
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