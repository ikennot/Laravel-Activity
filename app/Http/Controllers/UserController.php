<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function registration(Request $req){
        $incomingrequest = $req->validate([
            'name' =>['required','min:3','max:10',Rule::unique('users','name')],
            'email' =>['required',Rule::unique('users','email')],
             'password' =>['required','min:3']
        ]);
         
        $incomingrequest['password'] = bcrypt($incomingrequest['password']);
       $user =  User::create($incomingrequest);
        auth()->login($user);
        return redirect('/home');
    }


    public function logout(){
        auth()->logout();
        return redirect('/auth');
    }


    public function login(Request $req){
      
        $incomingfields = $req->validate([
            'loginname'=>'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['name' =>$incomingfields['loginname'],'password'=>$incomingfields['loginpassword']])){
            $req->session()->regenerate();
        }

        return redirect('/home');
    }   
}
