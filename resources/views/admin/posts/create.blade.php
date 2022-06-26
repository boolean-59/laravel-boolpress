@extends('layouts.admin')

@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Crea Post</h2>
                </div>
                <div class="card-body">
<form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" placeholder="Inserisci titolo" required>
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="contentEditor" class="form-label">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="contentEditor" cols="30" rows="10">{{old('content')}}</textarea>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="category" class="form-label">Category</label>
         <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
            <option value="">Select category</option>
            @foreach ($categories as $category)
             <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

         </select>
         @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>

        <div class="form-group">
            <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
            <label for="image">Aggiungi immagine</label>
            <input type="file" id="image" name="image" onchange="boolpress.previewImage();">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

      </div>

        <div class="form-group">
            <h5>Tags</h5>
            @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}} id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}">
                    <label class="form-check-label"  for="{{$tag->slug}}">{{$tag->name}}</label>
                </div>
            @endforeach
            @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input  @error('published') is-invalid @enderror" {{old('published') ? 'checked' : ''}} id="published" name="published">
      <label class="form-check-label"  for="published">Published</label>
      @error('published')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
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

