@extends('layout')
@section('content')
@use('App\Models\User', 'User')

<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Wrnt</th>
            <th scope="col">Master</th>
        </tr>
    </thead>
    <tbody>
        @foreach($things as $thing)
        <tr>
            <th scope="rol"><a href="/thing/{{ $thing->id }}">{{$thing->name}}</a></th>
            <td>{{ $thing->description }}</td>
            <td>{{ $thing->wrnt }}</td>
            <td>{{ User::findOrFail($thing->master_id)->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $things->links() }}

@endsection