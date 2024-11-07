@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">

            <!-- Tombol Login dengan Google -->
            <p style="color: red">notes: silahkan login mengguanakan Email Fellow masing-masing untuk mengakses LUB</p>
            <button class="btn btn-outline-primary btn-block btn-lg"
                onclick="window.location.href='{{ url('auth/google') }}'">
                <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" style="height: 20px; margin-right: 10px;">
                Login dengan Email Fellow / LPKIA
            </button>

            <!-- Accordion untuk Login dengan Email dan Password -->
            <div class="accordion mt-3" id="loginAccordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-info btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Login dengan Email & Password
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#loginAccordion">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        tabindex="1" autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        tabindex="2">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-muted mt-5 text-center">
        <p>
            Untuk login dengan email dan password <br>
            Silahkan Login dengan <strong> Email Fellow </strong> dan
            <br>
            <strong>Password Default adalah NRP </strong> Lakukan Perubahan Password pada menu Profil
            <br>
            jika ada kendala silahkan kunjungi <a href="https://helpdesk.lpkia.ac.id" target="_black">helpdesk lpkia</a>
        </p>
    </div>

@endsection