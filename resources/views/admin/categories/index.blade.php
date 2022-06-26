@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista categorie</div>

                    <div class="card-body">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Crea nuova categoria</a>
                        @if (session()->has('message'))
                            <div class="alert alert-success mb-3 mt-3">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Creation date</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td> <a
                                                href="{{ route('admin.categories.show', $category->id) }}">{{ $category->id }}</a>
                                        </td>
                                        <td> <a
                                                href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
                                        </td>
                                        <td>{{ $category->created_at }}</td>
                                        <td><a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="boolpress.openModal(event, {{ $category->id }})"
                                                    class="btn btn-warning delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
