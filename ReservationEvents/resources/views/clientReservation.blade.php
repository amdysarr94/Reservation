@extends('layout')
@section('title', 'Réservation')
@section('content')
    <!-- affichage des événements encore disponibles -->
    <div class="container">
        <div class="row">
            @foreach($events as $event)
                @if($event->isClose == "Non")
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card text-center clean-card position-relative">
                        <img class="card-img-top w-100 d-block" src="{{url('public/images/'.$event->image) }}"
                         style="height: 200px; object-fit: cover;">
                            <div class="card-header">{{$event->libelle}} </div>
                            <div class="card-body">
                                <p class="card-text">{{$event->description}}</p>
                                <p class="card-text">{{$event->date_event}}</p>

                            <!-- Boutons avec espacement ajusté -->
                            <div class="d-flex justify-content-center align-items-center">
                                <form action="{{route('clientReserve', $event->id)}}" method="get" class="mr-2">
                                    @csrf
                                    <input type="hidden" name="client_id" value="{{$client_id}}">
                                    <input type="hidden" name="event_id" value="{{$event->id}}">
                                    <button type="submit" class="btn btn-warning">Réserver</button>
                                </form>
                            </div>
                        </div>
                        </div>  
                    </div>
                    <div class="col-md-1"></div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
