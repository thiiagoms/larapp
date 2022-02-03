@extends('layouts.template')

@section('title')
    Seasons List
@endsection

@section('content')

    <div class="d-flex justify-content-center mt-4 mb-4 text-center">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">{{ $series->name }} Seasons</h1>
        </div>
    </div>

    <ul class="list-group">
        @foreach($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes_by_seasons', ['season' => $season ]) }}">Season {{ $season->seasons_quantity }}</a>
                <span class="badge bg-secondary">
                {{ $season->watchedEpisodes()->count() }} / {{ $season->episodes->count() }}
            </span>
            </li>
        @endforeach
    </ul>

@endsection
