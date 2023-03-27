<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    static public function index()
    {
        $category = category::orderBy('id')->paginate(20);
        $post = Post::all();
        return view('admin.categories', [
            'category' => $category,
            'post' => $post
        ]);
    }
    public function delete(){
        $attributes = request()->validate([
            'id' => 'required',
        ]);
        category::find($attributes['id'])->delete();

        return Redirect::back()->with('success', 'Category has been deleted.');
    }
    public function create(){
        $category = request()->validate([
           'category'=>'required',
        ]);
        $cat  = $category['category'];
        category::create($category);
        return Redirect::back()->with('success', "$cat has been created");
    }
}
