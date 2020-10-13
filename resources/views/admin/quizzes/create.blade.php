@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Quizzes</h1>

    <form method="POST" action="{{ route() }}">
        @csrf

        <div class="form-group">
            <label for="name">Quiznaam</label>
            <input type="text" name="name" class="form-control" id="name"
                   aria-describedby="quiznameHelp" placeholder="Voer de quiznaam in">
        </div>

        <label for="description">Quiz omschrijving</label>
        <input type="text" name="description" class="form-control" id="name"
                aria-describedby="quizdescriptionHelp" placeholder="Voer een quiz omschrijving in">

    </form>
@endsection
