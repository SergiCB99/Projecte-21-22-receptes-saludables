<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Recipe",
      "name": "{{$recipe->name}}",
      "image": [
        "https://example.com/photos/1x1/photo.jpg",
        "https://example.com/photos/4x3/photo.jpg",
        "https://example.com/photos/16x9/photo.jpg"
      ],
      "author": {
        "@type": "Person",
        "name": "{{$recipe->user->name}}"
      },
      "datePublished": "{{$recipe->created_at}}",
      "description": "{{$recipe->description}}",
      "prepTime": "PT{{$recipe->prep_time}}M",
      "cookTime": "PT30M",
      "totalTime": "PT50M",
      "keywords": "cake for a party, coffee",
      "recipeYield": "10",
      "recipeCategory": "{{$recipe->category->name}}",
      "recipeCuisine": "American",
      "nutrition": {
        "@type": "NutritionInformation",
        "calories": "270 calories"
      },
      "recipeIngredient": [
        @foreach($recipe->ingredients as $ingredient)
                "{{$ingredient->ingredient}}",
        @endforeach
        ],
      "recipeInstructions": [
        {
        @foreach($recipe->steps as $step)
          "@type": "HowToStep",
          "name": "Preheat",
          "text": "{{$step->step}}",
        @endforeach
        },
      ],
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "5",
        "ratingCount": "18"
      },
      "video": {
        "@type": "VideoObject",
        "name": "How to make a Party Coffee Cake",
        "description": "This is how you make a Party Coffee Cake.",
        "thumbnailUrl": [
          "https://example.com/photos/1x1/photo.jpg",
          "https://example.com/photos/4x3/photo.jpg",
          "https://example.com/photos/16x9/photo.jpg"
         ],
        "contentUrl": "http://www.example.com/video123.mp4",
        "embedUrl": "http://www.example.com/videoplayer?video=123",
        "uploadDate": "2018-02-05T08:00:00+08:00",
        "duration": "PT1M33S",
        "interactionStatistic": {
          "@type": "InteractionCounter",
          "interactionType": { "@type": "WatchAction" },
          "userInteractionCount": 2347
        },
        "expires": "2019-02-05T08:00:00+08:00"
      }
    }
    </script>
@extends('layouts.master')
@section('content')
    <div class="recepta">
        <img class="imatgeRecepta" src="{{asset($recipe->image)}}">
        <h2>{{$recipe->name}}</h2>
        <h3>De: {{$recipe->user->name}}</h3>
        <h4>{{$recipe->description}}</h4>
        <h4>Ingredients</h4>
        @foreach($recipe->ingredients as $ingredient)
            <h5>{{$ingredient->ingredient}}</h5>
        @endforeach
        <h4>Pasos</h4>
        @foreach($recipe->steps as $step)
            <h5>{{$step->step}}</h5>
        @endforeach
    </div>

    <div class="comentaris">
        @foreach($recipe->comments as $comment)

            <div class="comentari">
                <h6>{{$comment->user->name}}</h6>
                <p>{{$comment->comment}}</p>
            </div>

        @endforeach

        @if(Auth::user() != null)
            <form action="{{route('comment.create')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
                <label for="comment">Comment:</label><br>
                <textarea id="comment" name="comment" rows="5" cols="50" placeholder="Write a comment"></textarea><br>
                <input type="submit" value="Submit">
            </form>
        @endif
    </div>
@stop
