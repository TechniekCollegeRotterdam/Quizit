@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Quizzes</h1>

    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif


    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('quizzes.index') }}">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quizzes.create') }}">Quiz aanmaken</a>
            </li>
        </ul>
    </nav>

    <table class="table .table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Quiz</th>
            <th scope="col">Omschrijving</th>
            <th scope="col">Quiz details</th>
            <th scope="col">Quiz aanpassen</th>
            <th scope="col">Quiz verwijderen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quizes as $quiz)
            <tr>
                <td scope="row">{{ $quiz->id }}</td>
                <td>{{ $quiz->name }}</td>
                <td>{{ $quiz->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
