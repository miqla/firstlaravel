@extends('layouts.main')

@section('container')
  <article>
    <h1 class="mb-5">{{ $post->title }}</h1>

    <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

    {{-- {{ $post->body }} --}}
    
    {!! $post->body !!}
    {{-- pake !! biar tag html nya dieksekusi, bukan di tampilkan --}}

  </article>    

  {{-- kasih display block biar bisa diatur posisinya --}}
  <a href="/posts" class="text-decoration-none mt-3 d-block">Back to Posts</a>
@endsection