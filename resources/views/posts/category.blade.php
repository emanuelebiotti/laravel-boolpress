@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Tutti i post con questa categoria {{ $category->name }}</h1>
    <ul>
    @forelse ($posts as $post)
        <li>
           <a href="{{ route('posts.show', $post->slug) }}"> {{ $post->title }} </a>
           di <strong> {{ $post->author }} </strong>, del {{ $post->created_at }},
        </li>
    @empty
      <p>Non ci sono post</p>
    @endforelse
    </ul>
  </div>

@endsection
