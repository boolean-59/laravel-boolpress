@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')

    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista Posts</div>

                    <div class="card-body">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Crea nuovo post</a>
                        @if (session()->has('message'))
                            <div class="alert alert-success mb-3 mt-3">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Creation date</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td> <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->id }}</a>
                                        </td>
                                        <td> <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <td><a href="{{ route('admin.posts.edit', $post->id) }}"
                                                class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="boolpress.openModal(event, {{ $post->id }})"
                                                    class="btn btn-warning delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
