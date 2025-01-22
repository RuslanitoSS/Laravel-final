@extends('layouts.app')
@section('title', 'Редактировать место хранения')

@section('content')
    <section>
        <h1>Редактировать место хранения</h1>
        <form action="{{ route('places.update', $place->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Название:</label>
            <input type="text" name="name" id="name" value="{{ $place->name }}" required>
            <br>

            <label for="description">Описание:</label>
            <textarea name="description" id="description">{{ $place->description }}</textarea>
            <br>

            <label for="repair">Ремонт:</label>
            <input type="checkbox" name="repair" id="repair" value="1" {{ $place->repair ? 'checked' : '' }}>
            <br>

            <label for="work">В работе:</label>
            <input type="checkbox" name="work" id="work" value="1" {{ $place->work ? 'checked' : '' }}>
            <br>

            <button type="submit">Обновить</button>
        </form>
        <a href="{{ route('places.index') }}">Назад к списку</a>
    </section>
@endsection
