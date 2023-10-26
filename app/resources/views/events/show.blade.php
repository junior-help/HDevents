@extends('layouts.main')

<link rel="stylesheet" type="text/css" href="public/css/styles.css">

@section('title', $event->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                @if ($event->photo_path)
                    <img id="img" src="{{ asset('storage/app/public/' . $event->photo_path) }}"
                        class="img-fluid img-thumbnail custom-image" alt="{{ $event->title }}">
                @else
                    <img id="img" src="/public/img/logo.jpg" class="img-fluid img-thumbnail custom-image" alt="{{ $event->title }}">
                @endif
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-city">
                    <ion-icon name="location-outline"></ion-icon>
                    {{ $event->city }}
                </p>
                <p class="events-participants">
                    <ion-icon name="people-outline"></ion-icon>
                    X participantes
                </p>
                <p class="event-owner">
                    <ion-icon name="people-circle-outline"></ion-icon>
                    Dono do evento
                </p>
                <h3>O evento conta com:</h3>
                    <ul id="items-list">
                    @foreach ($event->items as $item)
                        <li id="item-list-show"><ion-icon name="arrow-redo-outline"></ion-icon>{{$item}}</li>
                    @endforeach
                    </ul>
                <a class="bnt btn-primary" id="event" href="#">
                    Confirmar presença
                </a>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento:</h3>
                <p class="event-descripton">{{$event->description}}</p>
            </div>
        </div>
    </div>
@endsection
