@extends('layout')
@section('title', 'Login')
@section('content')
<div class="container">
    <form method="post" action="{{route('post.login')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="email">
            <small id="emailHelp" class="form-text text-muted">Entrez l'email </small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" value="" id="exampleInputPassword1" placeholder="Mot de passe" name="password" autocomplete="off">
        </div>
       
        <button type="submit" class="btn btn-primary">Se connecter</button>
   
    </form>
</div>
@endsection