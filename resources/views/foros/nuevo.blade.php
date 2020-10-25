@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{$subcategoria->subcategoria}}
            </div>
            <div class="col-12">
            <form action="{{route('foros.crear', ['path_url' => $subcategoria->path_url])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Titulo</label>
                        <input class="form-control @error('tema') is-invalid @enderror" name='tema' type='text' value="{{old('tema')}}"/>
                        @error('tema')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input class="form-control @error('descripcion') is-invalid @enderror" name='descripcion' type='text'  value="{{old('descripcion')}}"/>
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Tema</button>
                </form>
            </div>
        </div>
    </div>
@endsection