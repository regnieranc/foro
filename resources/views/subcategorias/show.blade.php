@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('subcategorias.update')}}" method="post">
                    @csrf
                    <input type="hidden" name='id' value="{{$subcategoria->id}}">
                    <div class="form-group">
                        <label>Categoría</label>
                        <select class="form-control" name="categoria" id="categoria" value="{{$subcategoria->categoria->id}}">
                            @foreach($categorias as $c)
                                <option value="{{$c->id}}">{{$c->categoria}}</option>
                            @endforeach
                        </select>
                        @error('subcategoria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Subcategoría</label>
                        <input class="form-control @error('subcategoria') is-invalid @enderror" name='subcategoria' type='text' value="{{$subcategoria->subcategoria}}"/>
                        @error('subcategoria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Posición</label>
                        <input class="form-control @error('posicion') is-invalid @enderror" name='posicion' type='text'  value="{{$subcategoria->posicion}}"/>
                        @error('posicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" name='descripcion' type='text'> {{$subcategoria->descripcion}}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection