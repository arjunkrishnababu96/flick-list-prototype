@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Movies List</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @empty($movies)
                <p>No movies in your list!</p>
            @else
                <ul>
                @foreach ($movies as $movie)
                    <li>{{ $movie->title }} ({{ ($movie->release_year) }})</li>
                @endforeach
                </ul>
            @endempty
        </div>
    </div>
</div>
@endsection