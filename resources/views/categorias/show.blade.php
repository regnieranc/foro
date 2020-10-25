@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('categorias.update')}}" method="post">
                    @csrf
                    <input name='id' type='hidden' value='{{$categoria->id}}' />
                    <div class="form-group">
                        <label>Categoría</label>
                        <input value="{{$categoria->categoria}}" class="form-control @error('categoria') is-invalid @enderror" name='categoria' type='text' />
                        @error('categoria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Posición</label>
                        <input value="{{$categoria->posicion}}" class="form-control @error('posicion') is-invalid @enderror" name='posicion' type='text' />
                        @error('posicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" name='descripcion' type='text'>{{$categoria->descripcion}}</textarea>
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