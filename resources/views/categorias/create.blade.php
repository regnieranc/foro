@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('categorias.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Categoría</label>
                        <input class="form-control @error('categoria') is-invalid @enderror" name='categoria' type='text' value="{{old('categoria')}}"/>
                        @error('categoria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Posición</label>
                        <input class="form-control @error('posicion') is-invalid @enderror" name='posicion' type='text'  value="{{old('posicion')}}"/>
                        @error('posicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" name='descripcion' type='text'> {{old('descripcion')}}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
@endsection