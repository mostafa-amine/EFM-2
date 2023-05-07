@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un habitant</h1>
    <form action="{{ route('habitants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="cin">CIN</label>
            <input type="text" class="form-control" id="cin" name="cin" required>
        </div>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>

        <div class="form-group">
            <label for="ville_id">Ville</label>
            <select class="form-control" id="ville_id" name="ville_id" required>
                @foreach($villes as $ville)
                <option value="{{ $ville->id }}">{{ $ville->ville }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection