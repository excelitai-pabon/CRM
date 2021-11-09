<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //all user 
    public function index(){
        $user=User::all();
        return view('user.all',compact('user'));
    }
}
