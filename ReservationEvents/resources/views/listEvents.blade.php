@extends('layout')
@section('title', 'Ajout')
@section('content')
    <div class="container">
        <div class="row mt-2">
            @foreach($events as $event)
                @if($event->association_id == $assosconn->id)
                    <div class="card alert alert-primary" style="max-width: 20rem;">
                        <div class="card-header">{{$event->libelle}} </div>
                        <div class="card-body">
                            <p class="card-text">{{$event->description}}</p>
                            <p class="card-text">{{$event->date_event}}</p>

                            <!-- Boutons avec espacement ajusté -->
                            <div class="d-flex">
                                <form action="{{route('updateEvent', $event->id)}}" method="get" class="mr-2">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{$event->id }}">
                                    <button type="submit" class="btn btn-warning">Modifier</button>
                                </form>
                                <form action="{{route('finishEvent', $event->id)}}" method="post" class="ml-2 mx-1">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <button type="submit" class="btn btn-success">Terminer</button>
                                </form>
                                <form action="{{route('deleteEvent', $event->id)}}" method="post" class="ml-2">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
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
