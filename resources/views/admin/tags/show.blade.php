@extends('layouts.admin')
@include('partials/popupdelete')
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
                        <div class="d-flex align-items-start">
                            <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="post" >
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="boolpress.openModal(event, {{ $tag->id }})"
                                    class="btn btn-warning delete">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
