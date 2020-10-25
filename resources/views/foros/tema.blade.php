@extends('layouts.app')
<div style="display:none;">{{\Carbon\Carbon::setLocale('es')}}</div>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('posts.responder', ['path_url' => $path_url])}}" class="btn btn-primary">Responder</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{$tema->tema}}
            </div>
            <div class="col-12">
                {{$tema->descripcion}}
            </div>
        </div>
        
        @if($tema->estado == 1 || $tema->estado == 2)
            <div class="row">
                <div class="col-12">
                    Posts
                </div>
                @forelse($posts as $p)
                    <div class="col-12 mb-2">
                        <div>{{$p->post}}</div>
                        <div style="font-size: 10px;">{{$p->usuario->name}} {{$p->created_at->diffForHumans()}}</div>
                    </div>
                @empty
                    <div class="col-12">
                        No hay posts en el tema
                    </div>
                @endforelse
            </div>
            {{$posts->links()}}
            <div class="row">
                <div class="col-12">
                    <form action="{{route('posts.responder')}}" method="post">
                        @csrf
                        <input type="hidden" name='path_url' value="{{$path_url}}">
                        <div class="form-group">
                            <label>Post</label>
                            <textarea class="form-control @error('post') is-invalid @enderror" name='post' type='text'> {{old('post')}}</textarea>
                            @error('post')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Responder</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection