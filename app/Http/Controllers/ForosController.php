<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Subcategoria;
use App\Tema;
use App\Post;
use Illuminate\Support\Str;
use Auth;

class ForosController extends Controller{
    public function index(){
        $categorias = Categoria::with(['subcategorias' => function($query){
            $query->orderBy('posicion', 'asc');
        }])->orderBy('posicion', 'asc')->get();
        return view('foros.index', compact('categorias'));
    }

    public function subcategoria(Request $request){
        $subcategoria_fijo = Subcategoria::where('path_url', '=', $request['path_url'])->with(['temas' => function($query){
            $query->where('estado', '=', 2)->orderBy('created_at', 'asc');
        }, 'temas.usuario'])->firstOrFail();
        $subcategoria = Subcategoria::where('path_url', '=', $request['path_url'])->with(['temas' => function($query){
            $query->where('estado', '!=', 2)->orderBy('created_at', 'asc');
        }])->firstOrFail();

        $path_url = $request['path_url'];
        return view('foros.subcategoria', compact('subcategoria_fijo', 'subcategoria', 'path_url'));
    }

    public function nuevo(Request $request){
        $sub = Subcategoria::select('id')->where('path_url', '=', $request['path_url'])->firstOrFail();
        $subcategoria = Subcategoria::select('id', 'subcategoria', 'path_url')->where('id', '=', $sub->id)->firstOrFail();
        return view('foros.nuevo', compact('subcategoria'));
    }

    public function crear(Request $request){
        
        $validatedData = $request->validate([
            'tema' => 'required|unique:temas',
            'descripcion' => 'required'
        ]);

        $subcategoria = Subcategoria::select('id')->where('path_url', '=', $request['path_url'])->firstOrFail();

        $path = Str::lower($request->input('tema'));
        $path = implode('_', preg_split('/\s+/', $path));

        $tema = Tema::where('path_url', '=', $path);

        if(is_null($tema)){
            $path = $path.time();
        }

        Tema::create([
            'tema' => $request['tema'],
            'descripcion' => $request['descripcion'],
            'usuario_id' => Auth::user()->id,
            'subcategoria_id' => $subcategoria->id,
            'estado' => 1,
            'path_url' => $path
        ]);
        return redirect('/foros'.'/'.$request['path_url']);
    }

    public function tema(Request $request){
        $subcategoria = Subcategoria::where('path_url', '=', $request['path_url'])->firstOrFail();
        $tema = Tema::where('path_url', '=', $request['path_tema'])->where('subcategoria_id', '=', $subcategoria->id)->with(['usuario' => function($query){
            $query->firstOrFail();
        }])->firstOrFail();
        $posts = Post::where('tema_id', '=', $tema->id)->orderBy('created_at', 'asc')->paginate(20);
        $path_url = $request['path_tema'];
        return view('foros.tema', compact('tema', 'path_url', 'posts'));
    }
}
