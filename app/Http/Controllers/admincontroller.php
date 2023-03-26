<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class admincontroller extends Controller
{
    //
    public static function dashboard()
    {
        if(! request('paginate')){
            $amount = 20;
        }else{
            $amount = request('paginate');
        }
//        Need to fix categories, broken still
        $post = Post::latest()->withRichText('body')->filter(request(['search', 'category']))->where('approved', '=', false)->paginate($amount);

        return view('admin.admin', [
            'post' => $post,
        ]);
    }

    public static function index()
    {
        if(! request('paginate')){
            $amount = 20;
        }else{
            $amount = request('paginate');
        }
//        Need to fix categories, broken still
        $post = Post::oldest()->withRichText('body')->filter(request(['search', 'category']))->where('approved', '=', false)->paginate($amount);

        return view('admin.queue', [
            'post' => $post,
        ]);
    }
    public static function approve(){
        $id = \request()->validate([
           'id'=>'required'
        ]);
        Post::where('id', $id)->update(['approved' => true, 'updated_at' => now()]);
        return Redirect::back()->with('success', "Post has been successfully approved");
    }

}
