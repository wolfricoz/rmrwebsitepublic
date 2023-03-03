<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    //
    public static function index()
    {
        $post = Post::query()->orderBy('created_at', 'DESC')->paginate(15);
//        $post = Post::with(['id', 'title'])->get();
        return view('index', [
            'post'=>  $post
        ]);
    }
    public static function dashboard()
    {
        $post = Post::query()->orderBy('created_at', 'DESC')->paginate(15);
//        $post = Post::with(['id', 'title'])->get();
        return view('dashboard', [
            'post'=>  $post
        ]);
    }
    public static function find($id){
        $post = static::all()->firstwhere('id', $id);
        if (! $post){
            throw new ModelNotFoundException();
        }
    }
    public static function created(){
        return view('create', [
        ]);
    }

    public function store(){
       $attributes = request()->validate([
           'title' => 'required',
           'body' => 'required',
           'category'=> ['required', Rule::exists('categories', 'id')]
       ]);
       $attributes['author'] = Auth::user()->name;
       $attributes['excerpt'] = "Test!";


       Post::create($attributes);

       return redirect('/');
    }
}
