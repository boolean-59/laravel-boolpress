@extends('layouts.admin')

@section('content')
    <h1>{{$category->name}}</h1>

    <h2>Related posts</h2>
    @if($category->posts)
        <ul>
            @foreach ($category->posts as $post)
                <li>{{ $post->title }}</li>
            @endforeach
        </ul>
    @endif
@endsection
