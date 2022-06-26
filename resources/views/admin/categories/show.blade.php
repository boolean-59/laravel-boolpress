@extends('layouts.admin')
@include('partials/popupdelete')
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
                        <div class="d-flex align-items-start">
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="boolpress.openModal(event, {{ $category->id }})"
                                    class="btn btn-warning delete">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
