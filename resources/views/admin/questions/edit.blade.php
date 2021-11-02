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
                <a class="nav-link" href="{{ route('quizzes.index') }}">Index</a>
            </li>
            <li>
                <a class="nav-link active" href="{{ route('questions.edit', ['question' => $question->id])}}">Vraag aanpassen</a>
            </li>
        </ul>
    </nav>


 <form method="POST" action="{{route('questions.update', ['question' => $question->id])}}">
     @method('PUT')
     @csrf

    <div class="form-group">
        <label for="question">Vraag</label>
        <input type="text" name="question" class="form-control" id="question"
               aria-describedby="nameHelp" placeholder="Voer de vraag in" value="{{old('question', $question->question)}}">
    </div>

    <div class="form-group">
        <label for="points">Punten</label>
        <input type="number" step="1" min="0" max="10" name="points" id="points" class="form-control"
               aria-describedby="pointHelp" placeholder="Voer het aantal punten in voor deze vraag" value="{{old('points', $question->points)}}">
    </div>



    <div class="form-group">
        <label for="answer1" name="name"><strong>Optie 1</strong></label>
        <input type="text" class="form-control" name="answer1" id="answer1"
               placeholder="Voer de eerste optie in" value="{{old('answer1', $question->answer1)}}">
    </div>


    <div class="form-group">
        <label for="answer2"><strong>Optie 2</strong></label>
        <input type="text" class="form-control" name="answer2" id="answer2"
               placeholder="Voer de tweede optie in" value="{{old('answer2', $question->answer2)}}">
    </div>


    <div class="form-group">
        <label for="answer3"><strong>Optie 3</strong></label>
        <input type="text" class="form-control" name="answer3" id="answer3"
               placeholder="Voer de derde optie in" value="{{old('answer3', $question->answer3)}}">
    </div>

    <div class="form-group">
        <label for="answer4"><strong>Optie 4</strong></label>
        <input type="text" class="form-control" name="answer4" id="answer4"
               placeholder="Voer de vierde optie in" value="{{old('answer4', $question->answer4)}}">
    </div>


    <div class="form-group">
        <label for="correct" id="correct">Correct antwoord</label>
        <select id="correct" name="correct" class="form-control">
            <option @if($question->correct==="answer1") selected @endif value="answer1">Optie 1</option>
            <option @if($question->correct==="answer2") selected @endif value="answer2">Optie 2</option>
            <option @if($question->correct==="answer3") selected @endif value="answer3">Optie 3</option>
            <option @if($question->correct==="answer4") selected @endif value="answer4">Optie 4</option>

        </select>
    </div>





        <div class="form-group">
            <label for="quiz_id">Quiznaam</label>
            <select name="quiz_id" id="quiz_id" class="form-control">
            @foreach($quizzes as $quiz)
                <option value="{{ $quiz->id }}"
                @if(old('quiz_id',$question->quiz_id) == $quiz->id)
                    selected
                   @endif
                >{{ $quiz->name }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn-primary">Aanpassen</button>

    </form>


@endsection
