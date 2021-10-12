@extends('layouts.main')

@section('container')
  <article>
    <h1 class="mb-5">{{ $post->title }}</h1>

    {{-- {{ $post->body }} --}}
    
    {!! $post->body !!}
    {{-- pake !! biar tag html nya dieksekusi, bukan di tampilkan --}}

  </article>    

  <a href="/posts">Back to Posts</a>
@endsection