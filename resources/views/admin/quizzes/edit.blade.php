@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Quiz/Aanpassen</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <u>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </u>
        </div>
    @endif


    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link" href="{{route('quizzes.index')}}">Index</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('quizzes.create')}}">Create</a>
            </li>
            <li>
                <a class="nav-link active" href="{{route('quizzes.edit', ['quiz' => $quiz->id])}}">Aanpassen</a>
            </li>
        </ul>
    </nav>



    <form method="POST" action="{{route('quizzes.update', ['quiz' => $quiz->id])}}">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">
                Quiz naam
            </label>
            <input type="text" class="form-control" name="name" id="name"
                   aria-describedby="QuizNameHelp" value="{{$quiz->name}}">
        </div>
        <div class="form-group">
            <label for="description">
                Quiz Omschrijving
            </label>
            <input type="text" class="form-control" name="description"
                   aria-describedby="QuizDescriptionHelp" value="{{$quiz->description}}">
        </div>
        <button type="submit" class="btn-primary">Aanpassen</button>

    </form>

@endsection
