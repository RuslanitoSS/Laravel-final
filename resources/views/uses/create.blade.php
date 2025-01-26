@extends('layouts.app')
@section('title', 'Добавить новое использование')

@section('content')
    <section>
        <h1>Добавить новое использование</h1>
        <form action="{{ route('uses.store') }}" method="POST">
            @csrf
            <label for="thing_id">Вещь:</label>
            @if ($things->isEmpty())
                <p>Нет доступных вещей для выбора.</p>
            @else
                <select class="custom-select" name="thing_id" id="thing_id" required>
                    @foreach ($things as $thing)
                        <option class="custom-option" value="{{ $thing->id }}">{{ $thing->name }}</option>
                    @endforeach
                </select>
            @endif
            <br>

            <label for="place_id">Место:</label>
            @if ($places->isEmpty())
                <p>Нет доступных мест для выбора.</p>
            @else
                <select class="custom-select" name="place_id" id="place_id" required>
                    @foreach ($places as $place)
                        <option class="custom-option" value="{{ $place->id }}">{{ $place->name }}</option>
                    @endforeach
                </select>
            @endif
            <br>

            <label for="user_id">Пользователь:</label>
            @if ($users->isEmpty())
                <p>Нет доступных пользователей для выбора.</p>
            @else
                <select class="custom-select" name="user_id" id="user_id" required>
                    @foreach ($users as $user)
                        <option class="custom-option" value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            @endif
            <br>

            <label for="amount">Количество:</label>
            <input type="text" name="amount" id="amount" pattern="^\d+$" required min="1">
            @error('amount')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <button type="submit" {{ $things->isEmpty() || $places->isEmpty() || $users->isEmpty() ? 'disabled' : '' }}>
                Сохранить
            </button>
        </form>
        <a href="{{ route('uses.index') }}">Назад к списку</a>
    </section>
@endsection
