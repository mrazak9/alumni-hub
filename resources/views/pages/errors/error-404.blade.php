@extends('layouts.error')

@section('title', '404')

@section('main')
    <div class="page-error">
        <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
                The page you were looking for could not be found.
            </div>
            <div class="page-search">

                <div class="mt-3">
                    <a class="btn btn-primary" href="/">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
