@extends('layouts.admin')
@section('content')
<form action="{{route('admin.tags.update', $tag->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{old('name', $tag->name)}}" placeholder="Insert tag name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
