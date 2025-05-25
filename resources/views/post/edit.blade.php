@extends('layout')

@section('content')
    <form method="POST" action="{{route('post.update', $post->id)}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label class="form-label">Заголовок</label>
            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
            @error('title')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Текст</label>
            <textarea class="form-control" name="content">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Категории</label>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{$category->id === $post->category_id ? ' selected ' : ''}} value="{{$category->id}}">{{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Рубрики</label>
            <select class="form-select" multiple name="rubrics[]">
                @foreach($rubrics as $rubric)
                    <option
                        @foreach($post->rubrics as $postRubric)
                            {{$rubric->id === $postRubric->id ? ' selected ' : ''}}
                        @endforeach
                        value="{{$rubric->id}}">{{$rubric->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Изображение</label>
            <input type="text" class="form-control" name="image" value="{{$post->image}}">
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection
