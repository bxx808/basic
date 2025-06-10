@php
    $queryId = request()->query('category-id');
@endphp
@extends('layout')

@section('content')
    @if(auth()->user()->role == 'admin')
        <a href="{{route('post.create')}}" class="btn btn-outline-success btn-lg mb-3">Создать</a>
    @endif
    <div class="">
        <table class="table">
            <thead>
            <tr>
                <form method="get" action="{{route('post.index', request()->fullUrl())}}">
                    <th scope="col">#</th>
                    <th scope="col">
                        Заголовок
                        <input type="text" name="title" class="form-control"  value="{{request()->get('title')}}">

                        @if(request()->has('title'))
                            <a href="{{route('post.index', request()->except('title'))}}">X</a>
                        @endif
                    </th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">
                        Категория
                        <select class="form-control" name="category-id">
                            @foreach($categories as $category)
                                <option
                                    {{(int) $queryId === $category->id ? " selected " : " "}} value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success">&#10004;</button>
                        @if(request()->has('category-id'))
                            <a href="{{route('post.index', request()->except('category-id'))}}">X</a>
                        @endif
                    </th>
                    <th scope="col"></th>
                </form>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $key => $post)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>{{$post->likes}}</td>
                    <td>{{$post->category->name}}</td>
                    <td class="d-flex gap-1">
                        <a href="{{route('post.show', $post->id)}}" class="btn btn-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                        @if(auth()->user()->role == 'admin')
                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{route('post.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$posts->withQueryString()->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection
