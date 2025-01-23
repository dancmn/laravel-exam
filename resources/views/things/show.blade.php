@extends('layout')
@section('content')

<div class="card text-center mb-3 mt-3">
    <div class="card-header">
        <b>Master:</b> {{ $master->name }}
    </div>
    <div class="card-body">
        <h5 class="card-title"><b>Name</b> — {{ $thing->name }}</h5>
        <p class="card-text"><b>Description</b> — {{ $thing->description }}</p>

        @can('update', $thing)
        <form action="/usething/{{ $thing->id }}/use" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label"><b>User</b></label>
                <select name="user_id" class="form-select" required>
                    <option value="">Выберите пользователя</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="place_id" class="form-label"><b>Place</b></label>
                <select name="place_id" class="form-select" required>
                    <option value="">Выберите место</option>
                    @foreach($places as $place)
                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label"><b>Amount</b></label>
                <input type="number" name="amount" class="form-control" required>
            </div>

            <input type="hidden" name="thing_id" value="{{ $thing->id }}">

            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
        @endcan

        <div class="d-flex justify-content-end gap-3">
            @can('update', $thing)
            <a href="/thing/{{ $thing->id }}/edit" class="btn btn-primary">Edit thing</a>
            <form action="/thing/{{ $thing->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete thing</button>
            </form>
            @endcan
        </div>
    </div>
</div>

@endsection