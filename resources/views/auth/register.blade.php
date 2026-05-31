@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Regisztracio</h1>

        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <label for="name">Nev</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label for="password">Jelszo</label>
            <input id="password" type="password" name="password" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <label for="password_confirmation">Jelszo ujra</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>

            <div style="margin-top: 0.75rem;">
                <button type="submit">Fiok letrehozasa</button>
            </div>
        </form>

        <p>Mar van fiokod? <a href="{{ route('login') }}">Jelentkezz be</a></p>
    </div>
@endsection
