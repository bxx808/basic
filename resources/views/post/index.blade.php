@extends('layout')

@section('content')
    @if(auth()->user()->role == 'admin')
        <a href="{{route('post.create')}}" class="btn btn-outline-success btn-lg mb-3">Создать</a>
    @endif
    <div class="">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Category</th>
                <th scope="col"></th>
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
        {{$posts->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection
