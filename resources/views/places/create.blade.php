@extends('layouts.app')
@section('title', 'Добавить новое место хранения')

@section('content')
<section>
    <h1>Добавить новое место хранения</h1>
    <form action="{{ route('places.store') }}" method="POST">
        @csrf
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" required>
        <br>

        <label for="description">Описание:</label>
        <textarea name="description" id="description"></textarea>
        <br>

        <label for="repair">Ремонт:</label>
        <input type="checkbox" name="repair" id="repair" value="1">
        <br>

        <label for="work">В работе:</label>
        <input type="checkbox" name="work" id="work" value="1">
        <br>

        <button type="submit">Сохранить</button>
    </form>
    <a href="{{ route('places.index') }}">Назад к списку</a>
</section>

@endsection


