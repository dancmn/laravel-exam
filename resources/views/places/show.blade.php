@extends('layout')
@section('content')

<div class="card text-center mb-3 mt-3">
    <div class="card-header">
        <b>Name:</b> {{ $place->name }}
    </div>
    <div class="card-body">
        <p class="card-text"><b>Description</b> — {{ $place->description }}</p>
        <div class="d-flex justify-content-end gap-3">
            <a href="/place/{{ $place->id }}/edit" class="btn btn-primary">Edit place</a>
            <form action="/place/{{ $place->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete place</button>
            </form>
        </div>
    </div>
</div>


@endsection