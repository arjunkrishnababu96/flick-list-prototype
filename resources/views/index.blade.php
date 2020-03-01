@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Your Movies</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/add-movie" method="post" class="form-inline">
                @csrf
                <input type="text" class="form-control mb-2 mr-sm-2" name="title" placeholder="Movie title" required>
                <button type="submit" class="btn btn-outline-primary btn-small mb-2">Submit</button>
            </form>

            @empty($movies)
                <p>No movies in your list!</p>
            @else
                <ul>
                @foreach ($movies->where('pivot.watched',false) as $movie)
                    <li>
                        {{ $movie->title }}
                        @if ($movie->release_year)
                            ({{ $movie->release_year }})
                        @endunless
                        {{ $movie->pivot->watched }}
                    </li>
                @endforeach
                </ul>

                <ul>
                @foreach ($movies->where('pivot.watched',true) as $movie)
                    <li>
                        <span class="watched">
                            {{ $movie->title }}
                            @if ($movie->release_year)
                                ({{ $movie->release_year }})
                            @endunless
                            {{ $movie->pivot->watched }}
                        </span>
                    </li>
                @endforeach
                </ul>
            @endempty
        </div>
    </div>
</div>
@endsection