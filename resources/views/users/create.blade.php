@extends('layouts.template')

@section('title')
    {{ $title }}
@endsection

@section('content')
    
    <div class="container-fluid py-5 mt-4">
        <h1 class="display-5 fw-bold">Create new user</h1>
    </div>

    @includeWhen(!empty($errors), 'errors.error', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required placeholder="Type your name here">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" required placeholder="Type your e-mail here">
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" required placeholder="Type your password here">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Register</button>
    </form>
@endsection