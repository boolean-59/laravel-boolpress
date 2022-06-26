@extends('layouts.admin')

@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        @if ($post->category)
                            <h2>{{ $post->category->name }}</h2>
                        @endif
                        <small>{{ $post->created_at }}</small> <span
                            class="badge {{ $post->published ? 'badge-success' : 'badge-info' }}">
                            {{ $post->published ? 'Published' : 'Draft' }}</span>
                        @if ($post->image)
                            <div class="text-center w-25 mt-3">
                                <img src="{{ asset('storage/' . $post->image) }}" class="rounded "
                                    alt="{{ $post->title }}">
                            </div>
                        @endif

                        <p>{!! $post->content !!}</p>

                        <h5>Tags</h5>
                        <ul>
                            @foreach ($post->tags as $item)
                                <li>{{ $item->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
