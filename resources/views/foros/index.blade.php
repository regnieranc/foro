@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($categorias as $c)
            <div class="row">
                <div class="col-12">
                    <table>
                        <thead class='thead-dark'>
                            <tr>
                                <th>{{$c->categoria}}</th>
                            </tr>
                            <tr>
                                <th style="font-size: 12px;">{{$c->descripcion}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($c->subcategorias as $s)
                                <tr>
                                    <td><a href="{{route('foros.subcategoria', ['path_url' => $s->path_url])}}">{{$s->subcategoria}}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection