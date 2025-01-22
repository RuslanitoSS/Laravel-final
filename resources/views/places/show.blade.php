@extends('layouts.app')
@section('title', 'Детали места хранения')

@section('content')
<section>
    <h1>Детали места хранения</h1>
    <p><strong>Название:</strong> {{ $place->name }}</p>
    <p><strong>Описание:</strong> {{ $place->description }}</p>
    <p><strong>Ремонт:</strong> {{ $place->repair ? 'Да' : 'Нет' }}</p>
    <p><strong>В работе:</strong> {{ $place->work ? 'Да' : 'Нет' }}</p>

    <a href="{{ route('places.index') }}">Назад к списку</a>
    <a href="{{ route('places.edit', $place->id) }}">Редактировать</a>
    <form action="{{ route('places.destroy', $place->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
</section>
@endsection



