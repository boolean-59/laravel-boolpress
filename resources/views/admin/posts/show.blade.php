@extends('layouts.admin')

@section('content')
    <h1>{{$post->title}}</h1>
    @if($post->category)
        <h2>{{$post->category->name}}</h2>
    @endif
    <small>{{$post->created_at}}</small>
    <p>{{$post->content}}</p>

    <h5>{{$post->published ? 'Published' : 'Unpublished'}}</h5>

@endsection
