@extends('layouts.master')
@section('content')

    <div class="container">
        <h3>{{$category->name}}</h3>
        <div class="row">
        @forelse($category->recipes as $recipe)
            <div class="col">
                <p class="nomAutor">{{$recipe->user->name}}</p>
                <img class="imatgeRecepta" src="{{asset($recipe->image)}}" width="150" height="150">
                <h5><a class="nomRecepta" href="{{route('recipe.show',['id'=>$recipe->id])}}">{{$recipe->name}}</a></h5>
                <p class="descripcioRecepta">{{$recipe->description}}</p>
            </div>
        @empty
            <p>Encara no hi han receptes per aquesta categoria</p>
        @endforelse
        </div>
    </div>

@stop
