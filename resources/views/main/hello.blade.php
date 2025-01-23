@extends('layout')
@section('content')

<div class="container mt-4">
    <h1 class="h2 mb-3">Карточки предметов</h1>

    <div class="row">
        @foreach($things as $thing)
            <div class="col-md-4">
                <div class="card mb-4">
                    @php
                        $places = $thing->places;
                        $place = $places[0];
                    @endphp

                    <div class="card-header">
                        <a href="/thing/{{ $thing->id }}"><b>Name:</b>
                         @repair($place->repair){{ $thing->name }}</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><b>Description:</b> {{ $thing->description }}</h5>
                        <p><b>Master:</b> {{ $thing->master->name ?? 'Нет мастера' }}</p>

                        @php
                            $currentOwner = $thing->useThings->last(); 
                        @endphp

                        <p><b>Owner:</b> {{ $currentOwner ? $currentOwner->user->name : 'Нет владельца' }}</p>
                        <p><b>Place:</b> {{ $currentOwner ? $currentOwner->place->name : 'Нет места' }}</p>
                        <p><b>Amount:</b> {{ $currentOwner ? $currentOwner->amount : '0' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection