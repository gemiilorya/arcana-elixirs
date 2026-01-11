@extends('layouts.app')

@section('title', 'Reset Password - Arcana Elixirs')

@section('content')
<div class="banner3">
    <div class="bg-dark">
        <img src="{{ asset('images/cauldron.png') }}" alt="Arcana Elixirs Logo" class="cauldron">
    </div>
    <div class="bg-light">
        <h2>Reset Password</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email">Email Address</label>
                <br>
                <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" required autofocus>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password">New Password</label>
                <br>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password-confirm">Confirm Password</label>
                <br>
                <input type="password" name="password_confirmation" id="password-confirm" required>
            </div>

            <div>
                <button type="submit">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection