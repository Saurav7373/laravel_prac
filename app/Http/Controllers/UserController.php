<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {

        if ($request->hasFile('image')) {
            User::uploadAvatar($request->image);
            $request->session()->flash('message','Image Uploaded Successfully');
            return redirect()->back();
        }
        
        // $request->session()->flash('');
        return redirect()->back()->with('error','Image not Uploaded.Try valid data');
    }

    public function index()
    {

        return view('myhome');
    }
}
