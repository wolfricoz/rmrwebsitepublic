<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use App\Models\User;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Output\ConsoleOutput;

class PostController extends Controller
{
    //
    public static function index()
    {
        if(! request('paginate')){
            $amount = 20;
        }else{
            $amount = request('paginate');
        }
//        Need to fix categories, broken still
        $post = Post::latest()->withRichText('body')->filter(request(['search', 'category']))->where('approved', '=', true)->paginate($amount);

        return view('index', [
            'post' => $post,
        ]);
    }

    public static function find($id)
    {
        $post = \Cache::remember("post.{$id}", now()->addMinutes(20), function () use ($id){
            return Post::find($id);
        });
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return view('post', [
            'post' => $post,
        ]);

    }

    public static function finduser($name)
    {
        $user = User::where('name', $name)->first();
        $post = Post::where('author', $name);
//        $post = Post::find($name);
        if (!$user) {
            throw new ModelNotFoundException();
        }
        return view('user', [
            'name' => $name,
            'user' => $user,
            'post' => $post->latest()->paginate(5)
        ]);
    }
    public static function user()
    {
        if(! request('paginate')){
            $amount = 20;
        }else{
            $amount = request('paginate');
        }
        $id = \auth()->id();
        $user = User::find($id);
        $post = Post::where('user_id', $id);
        $name = $user->name;
//        $post = Post::find($name);
        if (!$user) {
            throw new ModelNotFoundException();
        }
        return view('user', [
            'name' => $name,
            'user' => $user,
            'post' => $post->latest()->where('approved','=', true)->paginate($amount)
        ]);
    }

    public static function created()
    {
        return view('create', [
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        clean($attributes['body']);
        clean($attributes['title']);
        $attributes['author'] = Auth::user()->name;
        $attributes['user_id'] = Auth::user()->id;
        $attributes['category'] = category::find($attributes['category_id'])->category;
        $attributes['excerpt'] = substr($attributes['body'], 0, 300);

        $post = Post::create($attributes);
        return redirect("../post/{$post->id}");
    }

    public function delete(){
        $attributes = request()->validate([
            'id' => 'required',
            ]);
        Post::find($attributes['id'])->delete();

        return redirect('/');
    }

}
