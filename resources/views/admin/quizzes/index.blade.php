@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Quizzes</h1>

    <table class="table .table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Quiz</th>
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
