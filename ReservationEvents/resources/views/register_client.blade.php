@extends('layout')
@section('title', 'registrer')
@section('content')
<div class="container">
    <form method="post" action="{{route('post.register.client')}}">
        @csrf
        <div class="form-group">
            <label for="nom" class="form-label mt-4">Nom</label>
            <input type="text" class="form-control" id="nom" value="" aria-describedby="emailHelp" placeholder="Enter votre nom" name="nom">
            <small id="nomHelp" class="form-text text-muted">Entrez votre nom.</small>
        </div>
        <div class="form-group">
            <label for="prenonm" class="form-label mt-4">Prénom</label>
            <input type="text" class="form-control" id="prenom" value="" aria-describedby="emailHelp" placeholder="Enter votre prénom" name="prenom">
            <small id="prenomHelp" class="form-text text-muted">Entrez votre prénom.</small>
        </div>
        <div class="form-group">
            <label for="tel" class="form-label mt-4">Téléphone</label>
            <input type="tel" class="form-control" id="tel" name="tel" aria-describedby="emailHelp" placeholder="Enter votre numéro de téléphone">
            <small id="tellHelp" class="form-text text-muted">Entrez votre téléphone.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter votre email" name="email">
            <small id="emailHelp" class="form-text text-muted">Entrez votre adresse email.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" value="" id="exampleInputPassword1" name="password" placeholder="Mot de passe" autocomplete="off">
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
   
    </form>
</div>
@endsection