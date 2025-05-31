@extends('layout')

@section('content')
    <main class="form-signin w-100 m-auto">
        <form method="post" action="">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Авторизация</h1>
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
            <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
            <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p></form>
    </main>
@endsection
