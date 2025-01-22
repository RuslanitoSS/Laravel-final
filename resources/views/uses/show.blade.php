
@extends('layouts.app')
@section('title', 'Детали использования')

@section('content')
<section>
    <h1>Детали использования</h1>
    <p><strong>Вещь:</strong> {{ $uses->thing->name }}</p>
    <p><strong>Место:</strong> {{ $uses->place->name }}</p>
    <p><strong>Пользователь:</strong> {{ $uses->user->name }}</p>
    <p><strong>Количество:</strong> {{ $uses->amount }}</p>

    <a href="{{ route('uses.index') }}">Назад к списку</a>
    <a href="{{ route('uses.edit', $uses->id) }}">Редактировать</a>
    <form action="{{ route('uses.destroy', $uses->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
</section>
@endsection


