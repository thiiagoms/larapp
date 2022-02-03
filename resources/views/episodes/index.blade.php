@extends('layouts.template')

@section('title')
    Episodes by season
@endsection

@section('content')

    <div class="container-fluid py-5 mt-4">
        <h1 class="display-5 fw-bold">List episodes by season</h1>
    </div>

    @includeWhen(!empty($message), 'messages.message', ['message' => $message])

    <form action="{{ route('watch_episodes', ['season' => $seasonId ]) }}" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episode {{ $episode->episodes_quantity }}
                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}" {{ $episode->watched ? 'checked' : '' }}>
                </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary mt-3">Watch</button>
    </form>
@endsection
