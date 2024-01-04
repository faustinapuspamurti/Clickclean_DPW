@extends('layouts.authapp')

@section('title', 'Log In | Clickclean')

@section('content')
    <div class="kotak_login">
        <img class="logo" src="{{ asset('images/Logo.png') }}" alt="logo">
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <label>Email</label>
            <input type="text" name="email" class="form_login" placeholder="Masukkan Email Anda">
    
            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password Anda">
    
            <button type="submit" class="tombol_login">LOG IN</button>
            <br><br>
            <center>
                <label>Don't have an account? <a href="{{ route('register') }}" id="signup">SIGN UP</a></label>
            </center>
        </form>
    </div>
@endsection