<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Evenement;
use App\Models\Association;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DenyNotification;
use Illuminate\Database\Eloquent\Builder;

class ReservationController extends Controller
{
    
    function index($id){
        $client = Client::find($id);
       return view('homeClient', compact('client'));
    }
    function evenement(){
        $client_id= Auth::guard('client')->user()->id;
        // dd($client_id);
        $events = Evenement::all();
        return view('clientReservation', compact('client_id', 'events'));
    }
    function reserve(Request $request, $id){
        $id_client = Auth::guard('client')->user()->id;
        $client_infos = Client::find($id_client);
        $event_recu = $request->event_id;
        // dd($client_infos, $event_recu);
        return view('formReservation', compact('client_infos', 'event_recu', 'id_client'));
    }
    function reserveAdd(Request $request, $id){
        $id = $request->client_id;
        $reserve = new Reservation();
        $reserve->client_id = $id;
        $reserve->evenement_id = $request->evenement_id;
        $reserve->reference =  Str::random(8); 
        $reserve->followers = $request->followers;
        // dd($reserve);
        $reserve->save();
        return redirect()->route('homeClient', $id);
    }
    // dans la fonction reserveList je recupère id de l'association
    function reserveList($id){
        $info_assos = Association::find($id);
    
        if ($info_assos) {
            $association_id = $info_assos->id;
    
            $reservations = Reservation::whereIn('evenement_id', function ($query) use ($association_id) {
                $query->select('id')
                      ->from('evenements')
                      ->where('association_id', $association_id);
            })->get();
    
            // Vous pouvez maintenant accéder aux clients et aux événements associés à ces réservations
            $clients = Client::whereIn('id', $reservations->pluck('client_id'))->get();
            $events = Evenement::whereIn('id', $reservations->pluck('evenement_id'))->get();
            // dd($events);
            return view('ListReservation', compact('reservations', 'clients', 'events'));
        }
    
        // Gérez le cas où l'association n'est pas trouvée
        // ...
    
        return view('ListReservation');
    }
    
    
    function reserveUpdate(Reservation $reservation){
        // dd($reservation);
        $reservation->isValidate = "Non";
        // dd($reservation);
        $reservation->update();
        $client = Client::where('id', $reservation->client_id)->get()->first();
        // dd($client);
        $client->notify(new DenyNotification($reservation->id));
        return back();

    }
}
