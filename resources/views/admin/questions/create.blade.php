@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Vragen</h1>

    @if (session('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quizzes.index') }}">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('questions.create', ['quiz' => $quiz->id])}}">Vraag toevoegen</a>
            </li>
        </ul>
    </nav>

    <form method="POST" action="{{ route('admin.questions.store', ['quiz' => $quiz->id]) }}" enctype="multipart/form-data">
        @csrf


        <div class="form-group">
            <label for="question">Vraag</label>
            <input type="text" name="question" class="form-control" id="question"
                   aria-describedby="nameHelp" placeholder="Voer de vraag in" value="{{old('question')}}">
        </div>

        <div class="form-group">
            <label for="points">Punten</label>
            <input type="number" step="1" min="0" max="10" name="points" id="points" class="form-control"
            aria-describedby="pointHelp" placeholder="Voer het aantal punten in voor deze vraag" value="{{old('points')}}">
        </div>



        <div class="form-group">
            <label for="answer1" name="name"><strong>Optie 1</strong></label>
            <input type="text" class="form-control" name="answer1" id="answer1"
                      placeholder="Voer de eerste optie in" value="{{old('answer1')}}">
        </div>


        <div class="form-group">
            <label for="answer2"><strong>Optie 2</strong></label>
                <input type="text" class="form-control" name="answer2" id="answer2"
                    placeholder="Voer de tweede optie in" value="{{old('answer2')}}">
        </div>


            <div class="form-group">
                <label for="answer3"><strong>Optie 3</strong></label>
                <input type="text" class="form-control" name="answer3" id="answer3"
                   placeholder="Voer de derde optie in" value="{{old('answer3')}}">
            </div>

        <div class="form-group">
            <label for="answer4"><strong>Optie 4</strong></label>
            <input type="text" class="form-control" name="answer4" id="answer4"
                   placeholder="Voer de vierde optie in" value="{{old('answer4')}}">
        </div>


        <div class="form-group">
            <label for="correct" id="correct">Correct antwoord</label>
            <select id="correct" name="correct" class="form-control">
                <option @if(old('correct')==="answer1") selected @endif value="answer1">Optie 1</option>
                <option @if(old('correct')==="answer2") selected @endif value="answer2">Optie 2</option>
                <option @if(old('correct')==="answer3") selected @endif value="answer3">Optie 3</option>
                <option @if(old('correct')==="answer4") selected @endif value="answer4">Optie 4</option>
            </select>
        </div>

        <div class="form-group">
            <label for="quiz_id" hidden>Quiz_id</label>
            <textarea hidden type="text" class="form-control input-field" name="quiz_id" id="quiz_id">{{$quiz->id}}</textarea>
        </div>

        <button type="submit" name="AddQuestion" id="AddQuestion" class="btn btn-primary" value="AddQuestion">Vraag toevoegen</button>
        <button type="Submit" name="PublishQuestion" value="PublishQuestion">Publiceer vraag</button>

    </form>
@endsection

