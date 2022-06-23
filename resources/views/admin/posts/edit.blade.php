@extends('layouts.admin')
@section('content')
<form action="{{route('admin.posts.update', $post->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}" placeholder="Inserisci titolo">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{old('content', $post->content)}}</textarea>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
         <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
            <option value="">Select category</option>
            @foreach ($categories as $category)
             <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach

         </select>
         @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" {{old('published', $post->published ) ? 'checked' : ''}} id="published" name="published">
      <label class="form-check-label"  for="published">Published</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
