<!-- resources/views/things/edit.blade.php -->
@extends('layouts.app')
@section('title', 'Редактировать вещь')

@section('content')
    <section>
        <h1>Редактировать вещь</h1>
        <form action="{{ route('things.update', $thing->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Название:</label>
            <input type="text" name="name" id="name" value="{{ $thing->name }}" required>
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <label for="description">Описание:</label>
            <textarea name="description" id="description">{{ $thing->description }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <label for="wrnt">Гарантия/Срок годности:</label>
            <input type="text" name="wrnt" id="wrnt" value="{{ $thing->wrnt }}">
            @error('wrnt')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>
            <input type="hidden" name="master" value="{{ $thing->master }}">

            <button type="submit">Обновить</button>
        </form>
        <a href="{{ route('things.index') }}">Назад к списку</a>
    </section>

@endsection
