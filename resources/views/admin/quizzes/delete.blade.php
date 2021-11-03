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

    <form method="POST" action="{{route('quizzes.destroy', ['quiz' => $quiz->id])}}">
        @method('DELETE')
        @csrf

        <div class="form-group">
            <label for="name">
                Quiznaam
            </label>
            <input type="text" disabled="disabled" class="form-control" name="name"
                   aria-describedby="categorienameHelp" id="name" value="{{$quiz->name}}">
        </div>

        <div class="form-group">
            <label for="description">
                Beschrijving
            </label>
            <input type="text" class="form-control" name="description" id="descripton"
                   disabled="disabled" value="{{$quiz->description}}">
        </div>
        <button type="submit"  class="btn-danger">Delete</button>

    </form>

@endsection
