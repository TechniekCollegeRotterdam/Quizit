@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Vragen</h1>

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
            <h2 class="card-title">{{ $quiz->name }}</h2>
            <p class="card-text">{{ $quiz->description }}</p>
            <p class="card-text">{{$quiz->created_at}}</p>
            <p class="card-text">{{$quiz->updated_at}}</p>
            <li class="list-group-item">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Antwoord</th>
                        <th scope="col">Valid</th>
                        <th scope="col">Aangemaakt</th>
                        <th scope="col">Aangepast</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($questions->answers as $answer)
                        <tr>
                            <td scope="row">
                                {{$answer->id}}
                            </td>
                            <td>
                                {{$answer->answer}}
                            </td>
                            <td>
                                {{$answer->valid}}
                            </td>
                            <td>
                                {{$question->created_at}}
                            </td>
                            <td>
                                {{$question->updated_at}}
                            </td>
                    @endforeach
                    </tbody>
                    </tbody>
                </table>
            </li>
        </div>
    </div>
@endsection
