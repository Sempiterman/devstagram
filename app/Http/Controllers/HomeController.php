<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        //con pluck puedes traer solamente determinados campos especificados
        $ids = (auth()->user()->followings->pluck('id')->toArray());
        //el metodo wherein de eloquent verifica que un valor contenga en su columna un arreglo o el valor que se le esta pasando
        //metodo latest ordena del ultimo al primero 
        $posts = Post::whereIn('user_id',$ids)->latest()->paginate(20);
        //pasamos los posts a la vista mediante un array
        return view('home',[
            'posts' =>$posts
        ]);
    }

    // public function index()
    // {
    //     return view('home');
    // }
}
