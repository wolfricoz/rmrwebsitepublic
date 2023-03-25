<?php

namespace App\Http\Controllers;

use App\Models\User;
use Composer\Console\Input\InputArgument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    static public function index()
    {
            $user = User::oldest()->paginate(20);

            return view('admin.user', [
                'user' => $user,
            ]);
    }
    public static function update(){

        $data = [
            'id'=> request('id'),
            'IsAdmin'=> false,
            'IsMod'=> false,
            'IsPatron'=> false,

        ];
        if(\request()->has('IsAdmin'))
        {
            $data['IsAdmin'] = true;
        }else{
            $data['IsAdmin'] = false;
        }
        if(\request()->has('IsPatron'))
        {
            $data['IsPatron'] = true;
        }else{
            $data['IsPatron'] = false;
        }
        if(\request()->has('IsMod'))
        {
            $data['IsMod'] = true;
        }else{
            $data['IsMod'] = false;
        }
        $user = User::find($data['id']);
        User::find($data['id'])
        ->update(['IsPatron' => $data['IsPatron'], 'IsMod' => $data['IsMod'], 'IsAdmin' => $data['IsAdmin']]);
        return Redirect::back()->with('message', "$user->name has been updated");
    }
}
