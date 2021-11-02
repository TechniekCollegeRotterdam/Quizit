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

        </ul>
    </nav>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{$question->question}}</h2>
            <p class="card-text">Aantal punten {{$question->points}}</p>
            <p class="card-text">Correct antwoord: {{$question->correct}}</p>
            <p class="card-text">Aangemaakt: {{$question->created_at}}</p>
            <p class="card-text">Aangepast: {{$question->updated_at}}</p>
            <li class="list-group-item">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Aangemaakt</th>
                        <th scope="col">Geüpdate</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">
                                Answer 1
                            </td>
                          <td>
                              {{ $question->answer1 }}
                          </td>
                            <td>
                                {{$question->created_at}}
                            </td>
                            <td>{{$question->updated_at}}</td>

                        </tr>

                          <tr>
                            <td scope="row">
                                Answer 2
                            </td>
                            <td>
                                {{ $question->answer2 }}
                            </td>
                            <td>
                                {{$question->created_at}}
                            </td>
                              <td>{{$question->updated_at}}</td>

                        </tr>
                        <tr>
                            <td scope="row">
                                Answer 3
                            </td>
                            <td>
                                {{ $question->answer3 }}
                            </td>
                            <td>
                                {{$question->created_at}}
                            </td>
                            <td>{{$question->updated_at}}</td>

                        </tr>
                        <tr>
                            <td scope="row">
                                Answer 4
                            </td>
                            <td>
                                {{ $question->answer4 }}
                            </td>
                            <td>
                                {{$question->created_at}}
                            </td>
                            <td>{{$question->updated_at}}</td>

                        </tr>

                    </tbody>
                </table>
            </li>
        </div>
    </div>
@endsection
