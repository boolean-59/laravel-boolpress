@extends('layouts.admin')

@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $tag->name }}
                    </div>
                    <div class="card-body">


                        <h2>Related posts</h2>
                        @if ($tag->posts)
                            <ul>
                                @foreach ($tag->posts as $post)
                                    <li>{{ $post->title }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
