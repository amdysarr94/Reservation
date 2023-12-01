@extends('layout')

@section('content')
    <h1 style="text-align: center;">Liste des Réservations</h1>

    @foreach($reservations as $reservation)
        <div class="card mb-4">
            <div class="card-header">
                @foreach($clients as $client)
                @if($client->id == $reservation->client_id)
                <h2 class="card-title" style="text-align: center;">La réservation de {{ $client->prenom }} {{ $client->nom}}</h2>
            </div>
                
            <div class="card-body">
                
                    <div class="card mb-2">
                        <div class="card-body">
                            <p>Référence de réservation : {{ $reservation->reference }}</p>
                            <p>Événement : {{ $reservation->evenement->libelle }}</p>
                            <p>Email du client : {{$client->email}}</p>
                            <p>Nombre d'accompagnant : {{$reservation->followers}}
                            <!-- Ajoutez d'autres informations sur la réservation ici -->
                        </div>

                        <div class="card-footer">
                            <form class="d-flex" method="post" action="{{route('validateEmail')}}">
                                @csrf
                                <input type="hidden" name="id_client" value="{{$client->id}}">
                                <input type="hidden" name="id_reservation" value="{{$reservation->id}}">
                                <button type="submit" class="btn btn-success mr-2">Accepter</button>
                            </form>

                            <form class="d-flex" method="post" action="#">
                                @csrf
                                <input type="hidden" name="id_client" value="{{$client->id}}">
                                <input type="hidden" name="id_client" value="{{$reservation->id}}">
                                <button type="submit" class="btn btn-danger">Refuser</button>
                            </form>
                        </div>
                    </div>
                    @endif
                    @endforeach
            </div>
        </div>
    @endforeach
@endsection
