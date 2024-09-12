@extends('main')

@section('content')

@if ($errors->any())

<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
</div>
@endif
<div class="container">
    <h2>Modicare produs </h2>
</div>
<form action="{{route(" products.update",$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="hidden_id" value="{{$product->id}}">
    <div class="container">

        <div class="row">
            <div class="col"><label for="nume">Nume Produs</label></div>
            <div class="col"><input type="text" name="nume" id="nume" required value={{$product->nume}}></div>
        </div>
        <div class="row">
            <div class="col"><label for="descriere">Descriere</label></div>
            <div class="col"><textarea name="descriere" id="descriere" required>{{$product->descriere}}</textarea>
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
            <div class="col"><input type="file" name="imagine" id="imagine">
                <img src={{asset('imagini/'.$product->imagine)}} style="width:500px" alt="{{$product->nume}}" />
                <input type="hidden" name="h_imagine" value="{{$product->imagine}}">
            </div>
        </div>
        <div class="row mt-5">
            <input type="submit" class="btn btn-primary" value="Modifica" />
        </div>
    </div>



</form>
<script>
    document.getElementsByName('categorie')[0].value="{{$product->categorie}}"
</script>

@endsection