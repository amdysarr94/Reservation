@extends('layout')
@section('title', 'Ajout')
@section('content')
    <div class="container">
        <form method="post" action="{{route('addevent')}}" enctype="multipart/form-data">
        @csrf 
        <input type="hidden" value="{{$assosconn->id}}" name="idassos">
        <div class="form-group">
            <label for="nom" class="form-label mt-4">Libellé de l'événement</label>
            <input type="text" class="form-control" id="nom" value="" aria-describedby="emailHelp" placeholder="" name="libelle">
            <small id="nomHelp" class="form-text text-muted">Entrez le libellé de l'événement.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Date limite d'inscription</label>
            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="date_limit">
            <small id="emailHelp" class="form-text text-muted">Entrez la date limite pour les réservations.</small>
        </div>
        <div class="form-group">
            <label for="nom" class="form-label mt-4">Description de l'événement</label>
            <input type="text" class="form-control" id="nom" value="" aria-describedby="emailHelp" placeholder="" name="description">
            <small id="nomHelp" class="form-text text-muted">Entrez la description de l'événement.</small>
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label mt-4">Image mise en avant</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <div class="form-group">
            <label for="exampleSelect1" class="form-label mt-4">Est clôturé ou pas ?</label>
                <select class="form-select" id="exampleSelect1" name="isClose">
                    <option>Oui</option>
                    <option>Non</option>
                </select>
            </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Date de l'événement</label>
            <input type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="date_event">
            <small id="emailHelp" class="form-text text-muted">Entrez l'email de l'association.</small>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    </div>
@endsection