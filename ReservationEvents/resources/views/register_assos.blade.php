@extends('layout')
@section('title', 'registrer')
@section('content')
<div class="container">
    <form method="post" action="{{route('post.register.association')}}" enctype="multipart/form-data">
       @csrf 
        <div class="form-group">
            <label for="nom" class="form-label mt-4">Nom de l'association</label>
            <input type="text" class="form-control" id="nom" value="" aria-describedby="emailHelp" placeholder="" name="nom">
            <small id="nomHelp" class="form-text text-muted">Entrez le nom de votre association.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="email">
            <small id="emailHelp" class="form-text text-muted">Entrez l'email de l'association.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" value="" id="exampleInputPassword1" placeholder="Mot de passe" name="password" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="date" class="form-label mt-4">Date de création</label>
            <input type="date" class="form-control" value="" id="date" name="date" placeholder="Date de création" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="slogan" class="form-label mt-4">Slogan</label>
            <input type="text" class="form-control" id="slogan" name="slogan" value="" aria-describedby="emailHelp" placeholder="">
            <small id="prenomHelp" class="form-text text-muted">Entrez le slogan de l'association.</small>
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label mt-4">Logo de l'association</label>
            <input class="form-control" type="file" id="formFile" name="logo">
        </div>
       
        <button type="submit" class="btn btn-primary">Envoyer</button>
   
    </form>
</div>
@endsection