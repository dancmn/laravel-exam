@extends('layout')
@section('content')
@use('App\Models\User', 'User')

<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Repair</th>
            <th scope="col">Work</th>
        </tr>
    </thead>
    <tbody>
        @foreach($places as $place)
        <tr>
            <th scope="rol"><a href="/place/{{ $place->id }}">{{$place->name}}</a></th>
            <td>{{ $place->description }}</td>
            <td>{{ $place->repair }}</td>
            <td>{{ $place->work }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $places->links() }}

@endsection