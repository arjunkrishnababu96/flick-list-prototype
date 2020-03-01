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
                        <form action="/movieuser/update" method="post">
                            @csrf
                            {{ $movie->title }}
                            @if ($movie->release_year)
                                ({{ $movie->release_year }})
                            @endif
                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                            <input type="hidden" name="watched" value="{{ $movie->pivot->watched }}">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Watched</button>
                        </form>
                    </li>
                @endforeach
                </ul>

                <ul>
                @foreach ($movies->where('pivot.watched',true) as $movie)
                    <li>
                        <form action="/movieuser/update" method="post">
                                @csrf
                            <span class="watched">
                                {{ $movie->title }}
                                @if ($movie->release_year)
                                    ({{ $movie->release_year }})
                                @endif
                            </span>
                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                            <input type="hidden" name="watched" value="{{ $movie->pivot->watched }}">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Not watched</button>
                        </form>
                    </li>
                @endforeach
                </ul>
            @endempty
        </div>
    </div>
</div>
@endsection