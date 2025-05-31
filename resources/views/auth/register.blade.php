@extends('layout')

@section('content')
    <main class="form-signin w-100 m-auto">
        <form method="post" action="{{route('auth.register')}}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Регистрация</h1>
            <div class="mb-3">
                <label class="form-label">Имя</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Повторите пароль</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Зарегистрироваться</button>
            <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p>
        </form>
    </main>
@endsection
