@extends('layouts.admin')

@section('content')
    <h1>{{$post->title}}</h1>
    @if($post->category)
        <h2>{{$post->category->name}}</h2>
    @endif
    <small>{{$post->created_at}}</small> <span class="badge {{$post->published ? 'badge-success' : 'badge-info' }}"> {{$post->published ? 'Published' : 'Draft'}}</span>
    @if ($post->image)
    <div class="text-center w-25 mt-3">
        <img src="{{ asset('storage/' . $post->image) }}" class="rounded " alt="{{$post->title}}" >
      </div>

    @endif

    <p>{!!$post->content!!}</p>

    <h5>Tags</h5>
    <ul>
        @foreach ($post->tags as $item)
            <li>{{ $item->name }}</li>
        @endforeach
    </ul>

@endsection
