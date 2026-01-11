@extends('layouts.app')

@section('title', 'Reset Password - Arcana Elixirs')

@section('content')
<div class="banner3">
    <div class="bg-dark">
        <img src="{{ asset('images/cauldron.png') }}" alt="Arcana Elixirs Logo" class="cauldron">
    </div>
    <div class="bg-light">
        <h2>Reset Password</h2>

        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                <label for="email">Email Address</label>
                <br>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit">Send Password Reset Link</button>
            </div>
        </form>
    </div>
</div>
@endsection