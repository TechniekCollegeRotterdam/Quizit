@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Quizzes</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quizzes.index') }}">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quizzes.create') }}">Quiz aanmaken</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('quizzes.show'.
                        ['quiz' => $quiz->id]) }}">Quiz Details</a>
            </li>
        </ul>
    </nav>

    <div class="card">
        <div class="card-header">
            Quiz
        </div>
        <div class="card-body">
            <h2 class="card-title">{{ $quiz->name }}</h2>
            <p class="card-text">{{ $quiz->description }}</p>
        </div>
    </div>
@endsection
