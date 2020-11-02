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
                <a class="nav-link active" href="{{ route('quizzes.show', ['quiz' => $quiz->id]) }}">Quiz Details</a>
            </li>
        </ul>
    </nav>

    <div class="card">
        <div class="card-header">
            Quiz
        </div>
        <div class="card-body w-auto">
            <h2 class="card-title">{{ $quiz->name }}</h2>
            <p class="card-text">{{ $quiz->description }}</p>
            <p class="card-text">{{$quiz->created_at}}</p>
            <p class="card-text">{{$quiz->updated_at}}</p>
            <li class="list-group-item">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vraag</th>
                        <th scope="col">Punten</th>
                        <th scope="col">Aangemaakt</th>
                        <th scope="col">Aangepast</th>
                        <th scope="col">Antwoorden</th>
                    </tr>
                    </thead>
                    <tbody>

@foreach($quiz->questions as $question)
                        <tr>
                            <td scope="row">
                                {{$question->id}}
                            </td>
                            <td>
                                {{$question->question}}
                            </td>
                            <td>
                                {{$question->points}}
                            </td>

                            <td>
                                {{$question->created_at}}
                            </td>
                            <td>
                                {{$question->updated_at}}
                            </td>
                            <td>
                                <a class="nav-link" href="{{route('questions.show',['question' => $question->id])}}">Vraag Details</a>
                            </td>

                                 @endforeach
                    </tbody>
                    </tbody>
                </table>
            </li>
        </div>
    </div>
@endsection
