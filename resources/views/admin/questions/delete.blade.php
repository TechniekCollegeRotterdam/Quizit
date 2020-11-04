@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Categories/verwijderen</h1>


    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link" href="{{route('quizzes.index')}}">Index</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('quizzes.create')}}">Create</a>
            </li>
            <li>
                <a class="nav-link active">Delete</a>
            </li>
        </ul>
    </nav>

    @if($errors->any())
        <div class="alert alert-danger">
            <u>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </u>
        </div>
    @endif

    <form method="POST" action="{{route('questions.destroy', ['question' => $question->id])}}">
        @method('DELETE')
        @csrf

        <div class="form-group">
            <label for="question">
                Vraag
            </label>
            <p class="text-danger border border-dark">{{($question->id)}}</p>
            <input type="hidden" class="form-control" name="question"
                   aria-describedby="categorienameHelp" value="{{$question->id}}">
        </div>
        <button type="submit"  class="btn-danger">Delete</button>

    </form>

@endsection
