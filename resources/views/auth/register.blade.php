@extends('layouts.app')

@section('title', 'Register - Arcana Elixirs')

@section('content')
<div class="banner4">
    <div class="bg1">
        <div class="img1">
            <img src="{{ asset('images/logo.svg') }}" alt="Arcana Elixirs Logo" class="cauldron">
        </div>
        <div class="content">
            <div class="btn1">
                <p>Already have an account?</p>
                <button><a href="{{ route('login') }}">Sign In</a></button>
            </div>
            <h2>Welcome to Arcana Elixirs!</h2>
            <p>Arcana Elixirs – your one-stop shop for high-quality potions crafted for every need, desire, or mischief. Register Now!</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="eml">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required autofocus>
                    @error('first_name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="eml">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="eml">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="psw">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="psw">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>

                <div class="btn2">
                    <button type="submit">Register</button>
                </div>

                <div class="google">
                    <p>or continue with</p>
                    <div class="btn3"><button><i class="fa-brands fa-google"></i>Sign Up with Google</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection