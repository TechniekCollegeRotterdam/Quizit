@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Quizzes</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quizzes.index') }}">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('quizzes.create') }}">Quiz Aanmaken</a>
            </li>
        </ul>
    </nav>

    <form method="POST" action="{{ route('quizzes.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" class="form-control" id="name"
                   aria-describedby="quiznameHelp" placeholder="Voer de quiznaam in">
        </div>

        <div class="form-group">
            <label for="description">Omschrijving</label>

        </div>

    </form>
@endsection
