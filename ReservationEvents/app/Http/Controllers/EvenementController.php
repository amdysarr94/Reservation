<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Association;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    function index($id){
        $assosconn = Association::find($id);
        return view('addEvents', compact('assosconn'));
    }
    public function rules(){
            return [
                'libelle' => 'required',
                'date_limit' => 'required',
                'description' => 'required',
                'image' => 'required',
                'isClose' => 'required',
                'date_event' => 'required'
            ];
    }
    public function messages(){
        return [
            'libelle.required' => 'Desolé! remplir le champs libellé',
            'date_limit.required' => 'Desolé! la date limite est Obligatoire',
            'description.required' => 'Desolé! veuillez remplir le champs description svp',
            'image.required' => 'Desolé! veuillez donner une image illustrative de l\'événement svp',
            'isClose.required' => 'Desolé! on doit renseigner si l\'événement est toujours ouvert',
            'date_event.required' => 'Desolé! on doit renseigner si la date de l\'événement'
        ];
    }
    function addevent(Request $request){
        // dd($request->idassos, $request->libelle, $request->date_limit, $request->description, $request->image, 
        // $request->isClose, $request->date_event);
        $request->validate($this->rules(), $this->messages());
        $event = new Evenement();
        $event->association_id = $request->idassos;
        $event->libelle= $request->libelle;
        $event->date_limit =  $request->date_limit;
        $event->description = $request->description;
        if($request->file('image')){
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $fileName);
            $event['image'] = $fileName;
        }
        $event->isClose = $request->isClose;
        $event->date_event = $request->date_event;
        // dd($event);
        $event->save();
        return back();
        // return redirect()->route('dashboardAssos');
    }
    function list($id){
        $assosconn = Association::find($id);
        $events = Evenement::all();
        // dd($assosconn, $events);
        return view('listEvents', compact('assosconn', 'events'));
        // $eventsassos = Evenement::where('association_id', $id);
        // dd($eventsassos);
        // return view('listEvents', compact('eventsassos'));
        // return redirect()->route('listeventadd');
    }
    // function listaddd($id){
       
    // }
    function update($id){
        $event = Evenement::find($id);
        return view('updateEvents', compact('event'));
        
    }
    function updateSave(Request $request, $id){
        $request->validate($this->rules(), $this->messages());
        $event  = Evenement::find($id);
        $event->association_id = $request->idassos;
        $event->libelle= $request->libelle;
        $event->date_limit =  $request->date_limit;
        $event->description = $request->description;
        if($request->file('image')){
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $fileName);
            $event['image'] = $fileName;
        }
        $event->isClose = $request->isClose;
        $event->date_event = $request->date_event;
        //  dd($event);
        $event->save();
        return redirect()->route('listevent',$event->association_id);
    }
    function finish($id){
        $event = Evenement::find($id);
        // dd($event);
        $event->isClose = "Oui";
        $event->save();
        return redirect()->route('listevent',$event->association_id);
    }
    function delete($id){
        // dd(Evenement::find($id));
        $event = Evenement::find($id);
        $event->delete();
        return redirect()->route('listevent',$event->association_id);
    }
}
