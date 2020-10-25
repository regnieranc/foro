<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use App\Post;
use Auth;

class PostsController extends Controller
{
    public function responder(Request $request){
        $validatedData = $request->validate([
            'post' => 'required',
        ]);

        $tema = Tema::where('path_url', '=', $request['path_url'])->firstOrFail();

        if($tema->estado == 0){
            return redirect()->back();
        }

        Post::create([
            'post' => $request['post'],
            'usuario_id' => Auth::user()->id,
            'tema_id' => $tema->id
        ]);
        return redirect()->back();
    }
}
