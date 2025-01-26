@extends('layouts.app')
@section('title', 'Детали вещи')

@section('content')
<section>
    <h1>Детали вещи</h1>
    <p><strong>Название:</strong> {{ $thing->name }}</p>
    <p><strong>Описание:</strong> {{ $thing->description }}</p>
    <p><strong>Гарантия/Срок годности:</strong> {{ $thing->wrnt }}</p>
    <p><strong>Хозяин:</strong> {{ $thing->master }}</p>

    <a href="{{ route('things.index') }}">Назад к списку</a>
    <a href="{{ route('things.edit', $thing->id) }}">Редактировать</a>
    <form action="{{ route('things.destroy', $thing->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
</section>

@endsection
