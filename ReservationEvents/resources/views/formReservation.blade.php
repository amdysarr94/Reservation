@extends('layout')
@section('title', 'formulaire de réservation')
@section('content')
<div class="container">
    <form method="post" action="{{route('clientReserveAdd', $id_client)}}" enctype="multipart/form-data">
       @csrf 
       <input type="hidden" value="{{$id_client}}" name="client_id">
       <input type="hidden" value="{{$event_recu}}" name="evenement_id">
       <div class="form-group">
            <label for="follower" class="form-label mt-4">Nombre d'accompagnateurs</label>
            <input type="text" class="form-control" value="" id="follower" placeholder="Nombre d'accompagnateur" name="followers" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
@endsection