<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function rules()
    {
        return [
            'nom' => 'required',
            'email' => 'required',
            'password' => 'required',
            'date' => 'required',
            'logo' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Desolé! Veuillez saisir le nom de l\' association svp',
            'email.required' => 'Desolé! le champ email est Obligatoire',
            'password.required' => 'Desolé! veuillez remplir le champs mot de passe svp',
            'date.required' => 'Desolé! veuillez donner la date de création de votre association svp',
            'logo.required' => 'Desolé! l\'association doit donner son logo'
        ];
    }
    function registration(){
        return view('register_assos');
    }
    function postregistration(Request $request){
        $request->validate($this->rules(), $this->messages());
        // dd($request);
        $assos = new Association();
        $assos->nom = $request->nom;
        $assos->email = $request->email;
        $assos->password = $request->password;
        $assos->date_de_creation = $request->date;
        $assos->slogan = $request->slogan;
        //Enregistrement du logo en local
        if($request->file('logo')){
            $file = $request->file('logo');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $fileName);
            $assos['logo'] = $fileName;
        }
        // dd($assos);
        $assos->save();
        return redirect()->route('login');
    }
    
}
