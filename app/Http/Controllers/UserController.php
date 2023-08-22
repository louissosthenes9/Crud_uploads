<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
     public function register(Request $request){
          $data = $request->validate([
            'name'=>['required', Rule::unique('users','name')],
            'password'=>['required'],
            'email'=>['required']
          ]);

          $data['password'] = bcrypt($data['password']);

         $user= User::create($data);
         auth()->login($user);

          return redirect('/');
     }
}
