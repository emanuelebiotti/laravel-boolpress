@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Tutti i post</h1>
    <ul>
    @forelse ($posts as $post)
        <li>
           <a href="{{ route('posts.show', $post->slug) }}"> {{ $post->title }} </a>
           di <strong> {{ $post->author }} </strong>, del {{ $post->created_at }},
           @if (!empty($post->category))
             <a href="{{ route('posts.category', $post->category->slug )}}"> {{ $post->category->name }}</a>
           @else
             (category n.a.)
           @endif
           {{-- <em>({{ !empty($post->category) ? $post->category->name : 'n.a' }})</em> --}}
        </li>
    @empty
      <p>Non ci sono post</p>
    @endforelse
    </ul>
  </div>

@endsection
