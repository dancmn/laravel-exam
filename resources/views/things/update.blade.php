@extends('layout')
@section('content')

@if(session('status'))
  <div class="alert alert-danger">
      {{ session('status') }}
  </div>
@endif

<form action="/thing/{{ $thing->id }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $thing->name }}">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="description">{{ $thing->description }}</textarea>
  </div>
  <div class="mb-3">
    <label for="wrnt" class="form-label">Wrnt</label>
    <input type="wrnt" class="form-control" id="wrnt" name="wrnt" value="{{ $thing->wrnt }}">
  </div>
  <button type="submit" class="btn btn-primary">Update thing</button>
</form>

@endsection