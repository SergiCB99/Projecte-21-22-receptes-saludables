@extends('layouts.master')
@section('content')
<form action="{{route('recipe.store')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::id()}}">
    <label for="nomRecepta">Nom recepta</label><br>
    <input type="text" id="nomRecepta" name="nomRecepta"><br>
    <label for="descripcio">Descripcio</label><br>
    <textarea id="descripcio" name="descripcio" rows="5" cols="60"></textarea><br>
    <label for="prepTime">Temps Preparacio</label><br>
    <input type="number" id="prepTime" name="prepTime" max="90" min="0"><br>
    <label for="foto">Foto</label><br>
    <input type="file" id="foto" name="foto" multiple><br>
    <label for="categoria">Categoria</label><br>
    <select id="categoria" name="categoria">
    @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    <div id="ingredients">
        <label for="ingredient">Ingredients</label>  &nbsp;   <button class="btn btn-success" type="button" value="Afegir Ingredient" onclick="crearIngredient()">Afegir Ingredient</button><br>
        <input type="text" id="ingredient" name="ingredients[]">
    </div>
    <div id="pasos">
        <label for="pas">Pasos</label>  &nbsp;  <button class="btn btn-success" type="button" value="Afegir Pas" onclick="crearPas()">Afegir Pas</button><br>
        <input type="text" id="pas" name="pasos[]">
    </div>
    <button class="btn btn-primary" type="submit" value="Crear">Crear</button>
</form>


</body>
<script>
    function crearIngredient(){
        var x = document.createElement("INPUT");
        x.setAttribute("type", "text");
        x.setAttribute("id","ingredient");
        x.setAttribute("name","ingredients[]");
        document.getElementById("ingredients").appendChild(x);
    }

    function crearPas(){
        var x = document.createElement("INPUT");
        x.setAttribute("type", "text");
        x.setAttribute("id","pas");
        x.setAttribute("name","pasos[]");
        document.getElementById("pasos").appendChild(x);
    }
</script>
@stop
