@extends('layouts.app')
@section('title', 'Вход')
@section('content')
    <section>
        <h1>Вход</h1>

        {{-- Отображение общего статуса ошибки --}}
        @if (session('status') === 'error')
            <p class="error-message">Ошибка: Проверьте введённые данные.</p>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <button type="submit">Войти</button>
        </form>
        <a href="{{ route('register') }}">Нет аккаунта? Зарегистрироваться</a>
    </section>
@endsection
