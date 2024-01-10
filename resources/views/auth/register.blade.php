@extends('layouts.authapp')

@section('content')
    <div class="kotak_login">
        <img class="logo" src="images/Logo.png" alt="logo">
        <div class="container-grd">
            <div class="box">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input id="name" type="text" class="form_login" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form_login" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form_login" name="password" required autocomplete="new-password">
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form_login" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="okbutton">
                        <button type="submit" class="tombol_login">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
        </div>
    </div>
@endsection
