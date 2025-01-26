@extends('layouts.app')
@section('title', 'Добавить новую вещь')

@section('content')
    <section>
        <h1>Добавить новую вещь</h1>
        <form action="{{ route('things.store') }}" method="POST">
            @csrf
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" required>
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <label for="description">Описание:</label>
            <textarea name="description" id="description"></textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <label for="wrnt">Гарантия/Срок годности:</label>
            <input type="text" name="wrnt" id="wrnt">
            @error('wrnt')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <input type="hidden" name="master" value="{{ auth()->id() }}">
            @error('master')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <button type="submit">Сохранить</button>
        </form>
        <a href="{{ route('things.index') }}">Назад к списку</a>
    </section>

@endsection
