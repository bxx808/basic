@extends('layout')

@section('content')
    <form method="POST" action="{{route('post.store')}}">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Заголовок</label>
            <input type="text" class="form-control"  name="title" value="{{ old('title') }}">
            @error('title')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Текст</label>
            <textarea class="form-control" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Категории</label>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Рубрики</label>
            <select class="form-select" multiple  name="rubrics[]">
                @foreach($rubrics as $rubric)
                    <option value="{{$rubric->id}}">{{$rubric->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Изображение</label>
            <input type="text" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
