@extends('main')

@section('content')

@if ($errors->any())

<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
</div>
@endif
<div class="container"><h2>Adaugare produs nou</h2></div>
<form action="{{route("products.store")}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col"><label for="nume">Nume Produs</label></div>
            <div class="col"><input type="text" name="nume" id="nume" required></div>
        </div>
        <div class="row">
            <div class="col"><label for="descriere">Descriere</label></div>
            <div class="col"><textarea name="descriere" id="descriere" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col"><label for="categorie">Categorie</label></div>
            <div class="col">
                <select name="categorie" id="categorie" required>
                    <option></option>
                    <option value="Jucarii">Jucarii</option>
                    <option value="Televizoare">Televizoare</option>
                    <option value="Electronice">Electronice</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col"><label for="imagine">Imagine Produs</label></div>
            <div class="col"><input type="file" name="imagine" id="imagine" required></div>
        </div>
        <div class="row mt-5">
            <input type="submit" class="btn btn-primary" value="Adauga" />
        </div>
    </div>



</form>


@endsection
