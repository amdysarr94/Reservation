@extends('layout')
@section('title', 'Réservation')
@section('content')
    <!-- affichage des événements encore disponibles -->
    <div class="container">
        <div class="row mt-2">
            @foreach($events as $event)
                @if($event->isClose == "Non")
                    <div class="card alert alert-primary" style="max-width: 20rem;">
                        <div class="card-header">{{$event->libelle}} </div>
                        <div class="card-body">
                            <p class="card-text">{{$event->description}}</p>
                            <p class="card-text">{{$event->date_event}}</p>

                            <!-- Boutons avec espacement ajusté -->
                            <div class="d-flex">
                                <form action="{{route('clientReserve', $event->id)}}" method="get" class="mr-2">
                                    @csrf
                                    <input type="hidden" name="client_id" value="{{$client_id}}">
                                    <input type="hidden" name="event_id" value="{{$event->id}}">
                                    <button type="submit" class="btn btn-warning">Réserver</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
