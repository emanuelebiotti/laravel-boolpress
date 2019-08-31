@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Tutti i post</h1>
    <a href="{{ route('admin.posts.create')}}" class="btn btn-primary mb-3">Crea un nuovo post</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titolo</th>
          <th>Autore</th>
          <th>Categoria</th>
          <th>Data</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($posts as $post)
          <tr>
            <td>{{ $post->id}}</td>
            <td>{{ $post->title}}</td>
            <td>{{ $post->author}}</td>
            <td>{{ !empty($post->category) ? $post->category->name : '-'}}</td>
            <td>{{ $post->created_at}}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->id)}}">Visualizza</a>
                <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id)}}">Modifica</a>
                <form class="" action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input class="btn btn-danger" type="submit" name="" value="Cancella">
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8">Non ci sono post</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

@endsection
