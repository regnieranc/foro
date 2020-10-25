<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategoria;
use App\Categoria;
use Illuminate\Support\Str;

class SubcategoriasController extends Controller{
    public function index(){
        $subcategorias = Subcategoria::with(['categoria' => function($query){
            $query->select('id', 'categoria');
        }])->orderBy('posicion')->get();
        return view('subcategorias.index', compact('subcategorias'));
    }

    public function create(){
        $categorias = Categoria::select('id', 'categoria')->get();
        return view('subcategorias.create', compact('categorias'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'posicion' => 'required|integer',
            'subcategoria' => 'required|unique:subcategorias|max:255',
            'descripcion' => 'required',
            'categoria' => 'required|integer'
        ]);
        
        $path_url = Str::lower($request->input('subcategoria'));
        $path_url = implode('_', preg_split('/\s+/', $path_url));
        Subcategoria::create([
            'posicion' => $request->input('posicion'),
            'subcategoria' => $request->input('subcategoria'),
            'descripcion' => $request->input('descripcion'),
            'categoria_id' => $request->input('categoria'),
            'path_url' => $path_url
        ]);
        return  redirect('subcategorias');
    }

    public function show(Request $request){
        $subcategoria = Subcategoria::find($request['id']);
        $categorias = Categoria::all();
        return view('subcategorias.show', compact('subcategoria', 'categorias'));
    }

    
    public function update(Request $request){
        $validatedData = $request->validate([
            'posicion' => 'required|integer',
            'subcategoria' => 'required|unique:subcategorias,subcategoria,'.$request['id'],
            'descripcion' => 'required',
            'categoria' => 'required|integer',
            'id' => 'required|integer'
        ]);
        
        $path_url = Str::lower($request->input('subcategoria'));
        $path_url = implode('_', explode(' ', $path_url));

        $subcategoria = Subcategoria::findOrFail($request['id']);
        $subcategoria->posicion = $request->input('posicion');
        $subcategoria->subcategoria = $request->input('subcategoria');
        $subcategoria->descripcion = $request->input('descripcion');
        $subcategoria->categoria_id = $request->input('categoria');
        $subcategoria->path_url = $path_url;
        $subcategoria->save();
        return  redirect('subcategorias');
    }
}
