@extends('layouts.admin')
@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Modifica Post: {{$post->title}}</h2>
                </div>
                <div class="card-body">
<form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $post->title)}}" placeholder="Inserisci titolo">
      @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
      <label for="content" class="form-label">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="10">{{old('content', $post->content)}}</textarea>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
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
      <div class="form-group">
        @if ($post->image)
            <img id="uploadPreview" width="100" src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">
        @endif
        {{-- manca else --}}
        <label for="image">Aggiungi immagine</label>
        <input type="file" id="image" name="image" onchange="boolpress.previewImage();">
        @error('image')
           <div class="alert alert-danger">{{ $message }}</div>
         @enderror
    </div>
    <div class="form-group">
        <p><strong>Tags</strong></p>
        @foreach ($tags as $tag)
            <div class="form-check form-check-inline">

                @if (old("tags"))
                    <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array( $tag->id, old("tags", []) ) ? 'checked' : ''}}>
                @else
                    <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'checked' : ''}}>
                @endif
                <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
            </div>
        @endforeach
        @error('tags')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <p><strong>Check to publish</strong></p>
        <div class="form-check form-check-inline">

            <input type="checkbox" class="form-check-input" {{old('published', $post->published ) ? 'checked' : ''}} id="published" name="published">
            <label class="form-check-label"  for="published">Published</label>
            @error('published')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
                </div>
            </div>
        </div>
    </div>
</section>
  <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
  </script>
  <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
  </script>
@endsection
