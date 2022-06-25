@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')

<a href="{{route('admin.tags.create')}}" class="btn btn-primary mb-3">Crea nuovo tag</a>
@if(session()->has('message'))
	<div class="alert alert-success mb-3 mt-3">
		 {{session()->get('message')}}
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
    @foreach ($tags as $tag)
    <tr>
        <td> <a href="{{route('admin.tags.show', $tag->id)}}">{{$tag->id}}</a></td>
        <td> <a href="{{route('admin.tags.show', $tag->id)}}">{{$tag->name}}</a></td>
        <td>{{$tag->created_at}}</td>
        <td><a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-primary">Edit</a></td>
        <td>
            <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="boolpress.openModal(event, {{$tag->id}})" class="btn btn-warning delete">Delete</button>
            </form>
        </td>
      </tr>
    @endforeach


    </tbody>
  </table>
  {{ $tags->links() }}
@endsection

