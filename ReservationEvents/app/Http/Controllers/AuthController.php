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
            "email" => 'required',
            "password" => 'required'
        ]);
    
        $email = $request->email;
        $password = $request->password;
    
        if ($client = Client::where('email', $email)->first()) {
            $credentials = $request->validate([
                "email"=>["required", "email"],
                "password"=>["required"]
            ]);
            $test = auth()->guard("client")->attempt($credentials);
            if($test){
                $clientId = Auth::guard("client")->id();
                $client = Client::where("id", $clientId)->get()->first();
                Auth::login($client);
                $client = auth::user();
                return redirect()->route('indexClient', $client->id);
            }else {
                 return redirect()->route('register.client', $client->id);
                  }
          } elseif ($clienconn = Association::where('email', $email)->first()) {
            $credentials = $request->validate([
                "email"=>["required", "email"],
                "password"=>["required"]
            ]);
            // dd('ok');
            $test = auth()->guard("association")->attempt($credentials);
            //  dd($test);
            if($test){
                $assosId = Auth::guard("association")->id();
                // $assosId = auth()->user()->id;
                $clienconn = Association::where("id", $assosId)->get()->first();
                // session($clienconn);
                Auth::login($clienconn);
                $clienconn = auth::user();
                //  dd($clienconn);
                // dd('ok');
                // $evenements = Evenement::where("association_id", $assosId)->get();
                // dd($evenements);
                 return view('associationDashboard', ['clienconn' => $clienconn]);
            } else {
            return redirect()->route('register.client');
            }
    }
    
   
    }
    function logout(){
        Auth::guard('association')->logout();
        session()->invalidate();
 
        session()->regenerateToken();
 
        return redirect(route('login'));
    }
}
