@extends('layouts.admin')

@section('content')
    <h1>{{$tag->name}}</h1>

    <h2>Related posts</h2>
    @if($tag->posts)
        <ul>
            @foreach ($tag->posts as $post)
                <li>{{ $post->title }}</li>
            @endforeach
        </ul>
    @endif
@endsection
