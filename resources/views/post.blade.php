@extends('layouts.main')

@section('container')

  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8">
        <h1 class="mb-3">{{ $post->title }}</h1>

        {{-- keterangan by, in --}}
        <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">

        <article class="my-3 fs-5">
        {{-- {{ $post->body }} --}}        
        {!! $post->body !!}
        {{-- pake !! biar tag html nya dieksekusi, bukan di tampilkan --}}  
        </article>    

        {{-- kasih display block biar bisa diatur posisinya --}}
        <a href="/posts" class="text-decoration-none mt-3 d-block">Back to Posts</a>
      </div>
    </div>
  </div> 
    
@endsection