@extends('layouts.app')
<div style="display:none;">{{\Carbon\Carbon::setLocale('es')}}</div>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('foros.nuevo', ['path_url' => $path_url])}}" class='btn btn-primary'>Nuevo Tema</a>
            </div>
            <div class="col-12">
                @if(count($subcategoria_fijo->temas) != 0)
                    <div>
                        <div>Adheridos</div>
                        @foreach($subcategoria_fijo->temas as $t)
                        <div>
                            <div>{{$t->tema}}</div>
                        </div>
                        @endforeach
                    </div>
                @endif

                <div>Temas</div>
                @forelse($subcategoria->temas as $t)
                    <div>
                        <div><a href="{{route('foros.tema', ['path_url' => $path_url, 'path_tema' => $t->path_url])}}">{{$t->tema}}</a></div>
                        <div style="font-size: 10px;">tema iniciado por: {{$t->usuario->name}} hace {{$t->created_at->diffForHumans()}}</div>
                    </div>
                @empty
                    <div>no hay temas</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection