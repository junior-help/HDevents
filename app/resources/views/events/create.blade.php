@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie um evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="photo">Adicionar imagem do Evento:</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Digite o nome do Evento">
        </div>
        <div class="form-group" id="checksbox">
            <label for="description">Adicione itens de infraestrutura:</label>
            <div class="form-check custom-checkbox teste">
                <input type="checkbox" name="items[]" value="Cadeiras" class="form-check-input" id="check1">
                <label class="form-check-label" for="check1">Cadeiras</label>
            </div>
            <div class="form-check custom-checkbox">
                <input type="checkbox" name="items[]" value="Palco" class="form-check-input" id="check2">
                <label class="form-check-label" for="check2">Palco</label>
            </div>
            <div class="form-check custom-checkbox">
                <input type="checkbox" name="items[]" value="Som e Iluminação" class="form-check-input" id="check3">
                <label class="form-check-label" for="check3">Som e Iluminação</label>
            </div>
            <div class="form-check custom-checkbox">
                <input type="checkbox" name="items[]" value="Projetor e Tela" class="form-check-input" id="check4">
                <label class="form-check-label" for="check4">Projetor e Tela</label>
            </div>
            <div class="form-check custom-checkbox">
                <input type="checkbox" name="items[]" value="Mesas" class="form-check-input" id="check5">
                <label class="form-check-label" for="check5">Mesas</label>
            </div>
            <div class="form-check custom-checkbox">
                <input type="checkbox" name="items[]" value="Open bar" class="form-check-input" id="check6">
                <label class="form-check-label" for="check6">Open bar</label>
            </div>
        </div>
        <div class="form-group">
            <label for="title">Descrição:</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Descrição..."></textarea>
        </div>

        <div class="form-group">
            <label for="title">Data e Hora do Evento:</label>
            <input type="date" class="form-control" id="date" name="date">
            <input type="time" class="form-control" id="time" name="time">
        </div>  
        
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Digite a cidade do Evento">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

@endsection
