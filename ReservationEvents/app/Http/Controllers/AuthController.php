<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Client;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(){
        return view('login');
    }
    function authentificate(Request $request){
        $request->validate([
                "email"=> 'required',
                "password"=>'required'
            ]);
        $email = $request->email;
        $password = $request->password;
        
       if($client = Client::where('email', $email)->first()){
            // dd('ok');
            $client_password = $client->password;
           
            if($client_password===$password){
               
                Auth::login($client);
               
                return redirect()->route('indexClient', $client->id);
            }else {
                return redirect()->route('register.client', $client->id);
            }
           
        }elseif($client = Association::where('email', $email)->first()){
            if($client->password == $password){
                Auth::login($client);
                $clienconn = Auth::user();
                return view('associationDashboard', ['clienconn'=>$clienconn]);
            }else {
                return redirect()->route('register.association');
            }
        }else{
            return redirect()->route('register.client');
        }
        // if (Hash::check($password, $client->password)) {
            
        //     return redirect()->route('home');
        // }
    }
    function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
