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
            <label for="question">Vraag</label>
            <input type="text" name="question" class="form-control" id="question"
                   aria-describedby="nameHelp" placeholder="Voer de vraag in" disabled="disabled" value="{{$question->question}}">
        </div>

        <div class="form-group">
            <label for="points">Punten</label>
            <input type="number" step="1" min="0" max="10" name="points" id="points" class="form-control"
                   aria-describedby="pointHelp" placeholder="Voer het aantal punten in voor deze vraag" disabled="disabled" value="{{$question->points}}">
        </div>



        <div class="form-group">
            <label for="answer1" name="name"><strong>Optie 1</strong></label>
            <input type="text" class="form-control" name="answer1" id="answer1"
                   placeholder="Voer de eerste optie in" disabled="disabled" value="{{$question->answer1}}">
        </div>


        <div class="form-group">
            <label for="answer2"><strong>Optie 2</strong></label>
            <input type="text" class="form-control" name="answer2" id="answer2"
                   placeholder="Voer de tweede optie in" disabled="disabled" value="{{$question->answer2}}">
        </div>


        <div class="form-group">
            <label for="answer3"><strong>Optie 3</strong></label>
            <input type="text" class="form-control" name="answer3" id="answer3"
                   placeholder="Voer de derde optie in" disabled="disabled" value="{{$question->answer3}}">
        </div>

        <div class="form-group">
            <label for="answer4"><strong>Optie 4</strong></label>
            <input type="text" class="form-control" name="answer4" id="answer4"
                   placeholder="Voer de vierde optie in" disabled="disabled" value="{{$question->answer4}}">
        </div>


        <div class="form-group">
            <label for="correct" id="correct">Correct antwoord</label>
            <input id="correct" name="correct" class="form-control" disabled="disabled" value="{{$question->correct}}">


            </input>
        </div>





        <div class="form-group">
            <label for="quiz">Quiznaam</label>
            <input name="quiz" id="quiz" class="form-control" disabled="disabled" value="{{$question->quiz->name}}">
        </div>

        <button type="submit" class="btn- btn-danger">Verwijderen</button>


    </form>


@endsection

