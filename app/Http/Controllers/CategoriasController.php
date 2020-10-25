<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriasController extends Controller{
    public function index(){
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create(){
        return view('categorias.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'posicion' => 'required|integer',
            'categoria' => 'required|unique:categorias|max:255',
            'descripcion' => 'required'
        ]);

        Categoria::create([
            'categoria' => $request->input('categoria'),
            'descripcion' => $request->input('descripcion'),
            'posicion' => $request->input('posicion')
        ]);
        return redirect('categorias');
    }

    public function show(Request $request){
        $categoria = Categoria::find($request['id']);
        return view('categorias.show', compact('categoria'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
            'categoria' => 'required|unique:categorias,categoria,'.$request['id'],
            'descripcion' => 'required',
            'posicion' => 'required|integer'
        ]);
        $c = Categoria::findOrFail($request['id']);
        $c->categoria = $request['categoria'];
        $c->descripcion = $request['descripcion'];
        $c->posicion = $request['posicion'];
        $c->save();
        return redirect('categorias');
    }

    public function delete(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
        Categoria::findOrFail($request['id'])->delete();
        return redirect('categorias');
    }
}
