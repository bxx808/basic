@extends('layout')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>
    <span>{{$post->likes}}</span>
@endsection
