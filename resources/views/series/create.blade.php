@extends('layouts.template')

@section('title')
    Create Series
@endsection

@section('content')

    @includeWhen(isset($errors), "errors.error", ["errors" => $errors])

    <div class="container-fluid py-5 mt-4" style="text-align: center">
        <h1 class="display-5 fw-bold">Add new serie</h1>
    </div>

    <form method="POST">
        @csrf
        <div class="row mb-3">
            <label for="seriesName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="seriesName" name="seriesName" placeholder="Series name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="seriesSeasons" class="col-sm-2 col-form-label">Seasons</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="seriesSeasons" name="seriesSeasons" placeholder="How many seasons">
            </div>
        </div>
        <div class="row mb-3">
            <label for="seriesEpisodes" class="col-sm-2 col-form-label">Episodes by seasons</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="seriesEpisodes" name="seriesEpisodes" placeholder="Episodes by seasons">
            </div>
        </div>
        <div class="row mb-3">
            <label for="seriesDescription" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="seriesDescription" placeholder="Series description"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

@endsection
