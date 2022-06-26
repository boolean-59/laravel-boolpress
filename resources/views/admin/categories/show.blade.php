@extends('layouts.admin')

@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $category->name }}</div>

                    <div class="card-body">


                        <h2>Related posts</h2>
                        @if ($category->posts)
                            <ul>
                                @foreach ($category->posts as $post)
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
