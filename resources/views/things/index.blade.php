<!-- resources/views/things/index.blade.php -->
@extends('layouts.app')
@section('title', 'Список вещей')

@section('content')
<section>
    <h1>Список вещей</h1>
    <a href="{{ route('things.create') }}">Добавить новую вещь</a>
    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Гарантия</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($things as $thing)
                <tr>
                    <td>{{ $thing->name }}</td>
                    <td>{{ $thing->description }}</td>
                    <td>{{ $thing->wrnt }}</td>
                    <td>
                        <a href="{{ route('things.show', $thing->id) }}">Просмотреть</a>
                        <a href="{{ route('things.edit', $thing->id) }}">Редактировать</a>
                        <form action="{{ route('things.destroy', $thing->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection

