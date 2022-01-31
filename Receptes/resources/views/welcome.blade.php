    @extends('layouts.master')
    @section('content')

            <div class="categorias">
                <h3>Categories</h3>
                @foreach($categories as $category)
                    <a href="{{route('category.show',['id'=>$category->id])}}" >{{$category->name}}</a>
                @endforeach
            </div>
            <div class="container">
                <h3>Receptes</h3>
            <div class="row">
            @foreach($recipes as $recipe)

                <div class="col">
                    <p class="nomAutor">{{$recipe->user->name}}</p>
                    <img class="imatgeRecepta" src="{{asset($recipe->image)}}" width="150" height="150">
                    <h5><a class="nomRecepta" href="{{route('recipe.show',['id'=>$recipe->id])}}">{{$recipe->name}}</a></h5>
                    <p class="descripcioRecepta">{{$recipe->description}}</p>
                </div>

            @endforeach
            </div>
            </div>
@stop
