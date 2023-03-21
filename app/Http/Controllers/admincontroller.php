<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class admincontroller extends Controller
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
        $post = Post::latest()->withRichText('body')->filter(request(['search', 'category']))->where('approved', '=', false)->paginate($amount);

        return view('admin', [
            'post' => $post,
        ]);
    }
}
