<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Mail\ConfirmReservationMail;
use Illuminate\Support\Facades\Mail;



class ConfirmMailController extends Controller
{
    public function index(Request $request){
        $id_client = $request->id_client;
        $client = Client::find($id_client);
        $mailData = [
            'title'=> "Mail de confirmation de réservation",
            'body'=> "Votre réservation a été acceptée!"
        ];
        Mail::to($client->email)->send(new ConfirmReservationMail($mailData));
        dd('email envoyé avec succès!');
    }
}
