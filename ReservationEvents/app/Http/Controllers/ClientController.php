<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function rules()
    {
        return [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Desolé! Veuillez saisir votre nom svp',
            'prenom.required' => 'Desolé! Veuillez saisir votre prénom svp',
            'email.required' => 'Desolé! le champ email est Obligatoire',
            'tel.required' => 'Desolé! veuillez remplir le champs du numéro de téléphone svp',
            'password.required' => 'Desolé! veuillez donner votre mot de passe svp',
           
        ];
    }
    function registration(){
        return view('register_client');
    }
    function postregistration(Request $request){
        $request->validate($this->rules(), $this->messages());
        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        $client->téléphone = $request->tel;
        $client->password = Hash::make($request->password);
        // dd($client);
        $client->save();
        return redirect()->route('login');
    }
    function login(Request $request){
        // dd('ok');
        $credentials = $request->validate([
            "email"=>["required", "email"],
            "password"=>["required"]
        ]);
        // dd('ok');
        $test = auth()->guard("association")->attempt($credentials);
        //  dd($test);
        if($test){
            $assosId = Auth::guard("client")->id();
            // $assosId = auth()->user()->id;
            $clienconn = Client::where("id", $assosId)->get()->first();
            // session($clienconn);
            Auth::login($clienconn);
            $clienconn = auth::user();
            //  dd($clienconn);
            // dd('ok');
            // $evenements = Evenement::where("association_id", $assosId)->get();
            // dd($evenements);
             return view('associationDashboard', ['clienconn' => $clienconn]);
        }
    }
}
