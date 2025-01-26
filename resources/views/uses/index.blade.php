@extends('layouts.app')
@section('title', 'Список использований')

@section('content')
<section>
    <h1>Список использований</h1>
    <a href="{{ route('uses.create') }}">Добавить новое использование</a>
    <table>
        <thead>
            <tr>
                <th>Вещь</th>
                <th>Место</th>
                <th>Пользователь</th>
                <th>Количество</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($uses as $use)
                <tr>
                    <td>{{ $use->thing->name }}</td>
                    <td>{{ $use->place->name }}</td>
                    <td>{{ $use->user->name }}</td>
                    <td>{{ $use->amount }}</td>
                    <td>
                        <a href="{{ route('uses.show', $use->id) }}">Просмотреть</a>
                        <a href="{{ route('uses.edit', $use->id) }}">Редактировать</a>
                        <form action="{{ route('uses.destroy', $use->id) }}" method="POST" style="display:inline;">
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

