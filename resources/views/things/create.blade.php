@extends('layout')
@section('content')

<form action="/thing" method="POST" class="mt-3">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  <div class="mb-3">
    <label for="wrnt" class="form-label">Wrnt</label>
    <input type="date" class="form-control" id="wrnt" name="wrnt" value="{{ date('Y-m-d') }}">
  </div>
  <button type="submit" class="btn btn-primary">Save thing</button>
</form>
@endsection