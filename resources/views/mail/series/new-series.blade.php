@extends('layouts.template')

@section('title')
    Send new series mail
@endsection

@section('content')
    Name: {{ $seriesName }}<br>
    Description: {{ $seriesDescription }}<br>
    Seasons: {{ $seasons }}<br>
    Episodes by seasons: {{ $episodes }}<br>
@endsection