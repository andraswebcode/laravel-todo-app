@extends('layouts.app')

@section('content')
    <div class="topbar">
        <h1>Todo lista</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Kijelentkezes</button>
        </form>
    </div>

    <div class="card">
        <h2>Uj feladat</h2>
        <form method="POST" action="{{ route('todos.store') }}">
            @csrf
            <input type="text" name="title" placeholder="Pl. Vasarlas" value="{{ old('title') }}" required>
            @error('title') <div class="error">{{ $message }}</div> @enderror
            <button type="submit">Hozzaadas</button>
        </form>
    </div>

    <div class="card">
        <h2>Feladatok</h2>

        @forelse ($todos as $todo)
            <div class="todo-row">
                <div class="todo-title {{ $todo->is_completed ? 'done' : '' }}">
                    {{ $todo->title }}
                </div>

                <div style="display: flex; gap: 0.5rem;">
                    <form method="POST" action="{{ route('todos.toggle', $todo) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit">
                            {{ $todo->is_completed ? 'Visszaallit' : 'Kesz' }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('todos.destroy', $todo) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Torles</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Meg nincs feladatod.</p>
        @endforelse
    </div>
@endsection
