@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Quiz-Player</h1>

    @if (session('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('wrong'))
        <div class="alert-danger">
            {{ session('wrong') }}
        </div>
    @endif
    <p>Spel regels</p>
    <ul class="list-group">
        <li class="list-group-item">
            <p>Door deze quiz te spelen ga je er mee acord dat je score word gedeeld op een publikelijke ranglijst!</p>
        </li>
        <li class="list-group-item">
            <p>De menu balk zal tijdens het spelen van het spel niet beschickbaar zijn.</p>
        </li>
        <li class="list-group-item">
            <p>Niet ieder vraag heeft de waarde in punten de waarde van de vraag is te zien in het desbetreffende scherm</p>
        </li>
        <li class="list-group-item">
            <p class="text-danger">Verlaat het spel alstublieft niet voor dat u deze heeft voltoid. Dit kan problemen veroorzaken in het systeem.</p>
        </li>
        <li class="list-group-item">
            <p>Na het voltoiën van het spel kan je een pdf downloaden met de juiste antwoorden op de vragen van de quiz.</p>
        </li>

        <a href="{{ URL::route('game.create') }}" class="btn btn-primary"> Speel een quiz </a>
    </ul>
@endsection
