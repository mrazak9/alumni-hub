@extends('layouts.error')

@section('title', '503')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="page-error">
        <div class="page-inner">
            <h1>503</h1>
            <div class="page-description">
                Be right back.
            </div>
            <div class="page-search">
                <div class="mt-3">
                    <a class="btn btn-primary" href="/">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
