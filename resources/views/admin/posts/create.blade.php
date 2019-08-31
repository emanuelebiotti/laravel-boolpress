@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Inserisci un nuovo post</h1>
    <form class="" action="{{ route('admin.posts.store') }}" method="post">
      @csrf
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <div class="form-group">
        <label for="title">Titolo</label>
        <input class="form-control" type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="title">Autore</label>
        <input class="form-control"  type="text" name="author" value="{{ old('author') }}">
        @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="content">Testo articolo</label>
        <textarea class="form-control" name="content" rows="8" cols="80">{{ old('content') }}</textarea>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <select class="form-control" name="category_id">
          <option value="">Seleziona una categoria</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <input class="btn btn-success" type="submit" value="Inserisci l'articolo">
      </div>
    </form>
  </div>

@endsection
