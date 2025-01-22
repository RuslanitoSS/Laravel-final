@extends('layouts.app')
@section('title', 'Список мест хранения')

@section('content')
<section>
    <h1>Список мест хранения</h1>
    <a href="{{ route('places.create') }}">Добавить новое место</a>
    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Ремонт</th>
                <th>В работе</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($places as $place)
                <tr>
                    <td>{{ $place->name }}</td>
                    <td>{{ $place->description }}</td>
                    <td>{{ $place->repair ? 'Да' : 'Нет' }}</td>
                    <td>{{ $place->work ? 'Да' : 'Нет' }}</td>
                    <td>
                        <a href="{{ route('places.show', $place->id) }}">Просмотреть</a>
                        <a href="{{ route('places.edit', $place->id) }}">Редактировать</a>
                        <form action="{{ route('places.destroy', $place->id) }}" method="POST" style="display:inline;">
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

