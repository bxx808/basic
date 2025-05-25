@extends('layout')

@section('content')
    <a href="{{route('post.index')}}" class="btn btn-outline-success btn-lg mb-3">Назад</a>
    <div class="">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td>{{$post->title}}</td>
                    <td>
                        @foreach($post->rubrics as $rubric)
                            {{$rubric->name}}
                        @endforeach
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
