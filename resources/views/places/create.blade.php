@extends('layout')
@section('content')

<form action="/place" method="POST" class="mt-3">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  <div class="form-check form-switch">
    <input type="hidden" name="repair" value="0">
    <input class="form-check-input" type="checkbox" id="repair" name="repair" value="1">
    <label class="form-check-label" for="repair">Repair</label>
  </div>
  <div class="form-check form-switch">
    <input type="hidden" name="work" value="0">
    <input class="form-check-input" type="checkbox" id="work" name="work" value="1">
    <label class="form-check-label" for="work">Work</label>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Save place</button>
</form>
@endsection