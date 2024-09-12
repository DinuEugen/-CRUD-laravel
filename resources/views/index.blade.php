@extends('main')

@section('content')
<div class="container"><a class="btn btn-success" href="{{route("products.create")}}">Adauga Produs</a></div>

@if ($message=Session::get("success"))

<div class="alert alert-success">
    {{$message}}
</div>
@endif
<div class="container">
    @if(count($data)>0)
    @foreach($data as $row)
    <div class="row">
        <div class="col">
            <img src={{asset('imagini/'.$row->imagine)}} style="width:100px" alt="{{$row->nume}}" />
        </div>
        <div class="col">
            {{$row->nume}}
        </div>
        <div class="col">
            {{$row->categorie}}
        </div>
        <div class="col">
            {{$row->descriere}}
        </div>
        <div class="col">
            <a href="{{route('products.edit',$row->id)}}" class="btn btn-primary btn-sm mt-2">Modifica</a>
            <form method="post" action="{{route('products.destroy',$row->id)}}">
            @csrf
            @method('delete')
             <button class="btn btn-danger btn-sm mt-2">Sterge</button></form>
        </div>

    </div>

    @endforeach
</div>
@else
<p>Momentan tabelul nu contine inregistrari</p>
@endif


@endsection
