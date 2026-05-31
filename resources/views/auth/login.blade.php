@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Bejelentkezes</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label for="password">Jelszo</label>
            <input id="password" type="password" name="password" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <label>
                <input type="checkbox" name="remember"> Emlkezz ram
            </label>

            <div style="margin-top: 0.75rem;">
                <button type="submit">Belepes</button>
            </div>
        </form>

        <p>Nincs fiokod? <a href="{{ route('register') }}">Regisztralj</a></p>
    </div>
@endsection
