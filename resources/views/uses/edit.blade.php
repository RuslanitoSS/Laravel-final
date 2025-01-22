<!-- resources/views/uses/edit.blade.php -->
@extends('layouts.app')
@section('title', 'Pедактировать использование')

@section('content')
<section>
    <h1>Редактировать использование</h1>
    <form action="{{ route('uses.update', $use->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="thing_id">Вещь:</label>
        <select class="custom-select" name="thing_id" id="thing_id" required>
            @foreach ($things as $thing)
                <option class="custom-option" value="{{ $thing->id }}" {{ $thing->id == $use->thing_id ? 'selected' : '' }}>
                    {{ $thing->name }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="place_id">Место:</label>
        <select class="custom-select" name="place_id" id="place_id" required>
            @foreach ($places as $place)
                <option class="custom-option" value="{{ $place->id }}" {{ $place->id == $use->place_id ? 'selected' : '' }}>
                    {{ $place->name }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="user_id">Пользователь:</label>
        <select class="custom-select" name="user_id" id="user_id" required>
            @foreach ($users as $user)
                <option class="custom-option" value="{{ $user->id }}" {{ $user->id == $use->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="amount">Количество:</label>
        <input type="number" name="amount" id="amount" value="{{ $use->amount }}" required min="1">
        <br>

        <button type="submit">Обновить</button>
    </form>
    <a href="{{ route('uses.index') }}">Назад к списку</a>
</section>


@endsection
