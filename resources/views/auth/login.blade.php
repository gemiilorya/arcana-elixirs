@extends('layouts.app')

@section('title', 'Login - Arcana Elixirs')

@section('content')
<div class="banner3">
    <div class="bg">
        <div class="img">
            <img src="{{ asset('images/logo.svg') }}" alt="Arcana Elixirs Logo" class="cauldron">
        </div>
        <div class="content">
            <div class="btn1">
                <p>Don't have an account?</p>
                <button><a href="{{ route('register') }}">Sign Up</a></button>
            </div>
            <h2>Welcome Back!</h2>
            <p>Arcana Elixirs – your one-stop shop for high-quality<br>
             potions crafted for every need, desire, or mischief.<br> Buy now!</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="eml">
                    <label for="email">Email Address</label>
                    <br>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="psw">
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" id="password" required>
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="forgot">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>

                <div class="btn2">
                    <button type="submit">Login</button>
                </div>

                <div class="google">
                    <p>or continue with</p>
                    <button class="btn3"><i class="fa-brands fa-google"></i>Sign Up with Google</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
