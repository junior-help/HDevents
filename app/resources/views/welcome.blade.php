@extends('layouts.main')

@section('title', 'HD-Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
        </form>
    </div>
    <div id="events-container" class="col-md-12"> <!-- Correção: troque "cold-md-12" para "col-md-12" -->
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3" id="card-product">
                    @if ($event->photo_path)
                        <div class="image-container">
                            <img src="/storage/app/public/{{ $event->photo_path }}" alt="{{ $event->title }}">
                        </div>
                    @else
                        <div class="image-container">
                            <!-- Exibir uma imagem padrão caso o evento não tenha uma imagem -->
                            <img src="/public/img/logo.jpg" alt="{{ $event->title }}">
                        </div>
                    @endif
                    @if(count($events) == 0)
                        <p>Não há eventos disponiveis</p>
                    @endif  
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participantes">x-participantes</p>
                        <p class="card-">Cidade: {{ $event->city }}</p>
                        <p class="card-description">Descrição do evento: {{ $event->description }}</p>
                        <p class="card-">Privado: {{ $event->private == 1 ? 'Sim' : 'Não' }}</p>
                        <p class="card-date">Criação: {{ $event->created_at->format('d/m/Y H:i') }}</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary" id="saberMaisEventoHome">Saber
                            mais</a>
                    </div>
                </div>
            @endforeach
            @if(count($events) == 0)
                        <p>Não há eventos disponiveis</p>
            @endif
        </div>
    </div>
@endsection
