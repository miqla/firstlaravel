@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- ambil nama user yg lagi login --}}
    <h1 class="h2">Create New Post</h1>
  </div> 

  <div class="col-lg-10">
      <form method="POST" action="/dashboard/posts">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          {{-- tambahain disabled readonly klo mau --}}
          <input type="text" class="form-control" id="slug" name="slug" >
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" name="category_id">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>                
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <input id="body" type="hidden" name="body">
          <trix-editor input="body"></trix-editor>
        </div>
        
        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
  </div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

// biar slugnya dibuat otomatis setelah title nya diinput
// fetch dan json bentuknya msih promes, jadi perlu .then untuk ngambil
  title.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)     //inputnya title
      .then(response => response.json())
      .then(data => slug.value = data.slug)       //outputnya slug
  });

  // matiin fitur attach files
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  });
</script>
@endsection