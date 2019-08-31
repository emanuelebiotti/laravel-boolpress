@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>{{ $post->title }}</h1>
    @if (!empty($post->category))
      <span>Categoria:</span> <a href="{{ route('posts.category', $post->category->slug )}}"> {{ $post->category->name }}</a>
    @else
      (category n.a.)
    @endif
    <p> di {{ $post->author}} </p>
    <p>{{ $post->content}}</p>
    <p> <small>{{ $post->created_at }}</small> </p>
  </div>
@endsection
