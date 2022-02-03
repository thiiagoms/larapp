@extends('layouts.template')

@section('title')
    {{ $title }}
@endsection

@section('content')

    @includeWhen(!empty($errors), 'errors.error', ['errors' => $errors])

    <div class="container-fluid py-5 mt-4">
        <h1 class="display-5 fw-bold">Auth user</h1>
    </div>

    <form action="{{ route('auth_user') }}" method="post">
        @csrf
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" required placeholder="Please, type your e-mail here">
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" required placeholder="Please, type your password here">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Login</button>
        <a href="{{ route('create_user') }}">
            <button type="button" class="btn btn-secondary mt-3">Register</button>
        </a>
    </form>
@endsection
