@extends('layouts.app')
@section('title', 'Регистрация')
@section('content')

    <section>
        <h1>Регистрация</h1>

   
        @if (session('status') === 'error')
            <p class="error-message">Ошибка: Проверьте введённые данные.</p>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <p class="error-message">{{$message}}</p>
            @enderror
            <br>
            
            <label for="password_confirmation">Подтверждение пароля:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
            @error('password_confirmation')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <br>

            <button type="submit">Зарегистрироваться</button>
        </form>
        <a href="{{ route('login') }}">Уже есть аккаунт? Войти</a>
    </section>

@endsection
