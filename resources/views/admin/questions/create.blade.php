@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Vragen</h1>

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
                <a class="nav-link active" href="{{ route('questions.create') }}">Vraag toevoegen</a>
            </li>
        </ul>
    </nav>

    <form method="POST" action="{{ route('questions.store') }}">
        @csrf

        <div class="form-group">
            <label for="quiz_id"></label>
            <input type="number" id="quiz_id" value="{{$quiz}}" disabled>
        </div>

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
            <label for="goodanswer">Goed Antwoord</label>
            <input type="text" class="form-control" name="goodanswer" id="goodanswer"
                      placeholder="Voer het goede antwoord in" value="{{old('goodanswer')}}">
        </div>


        <div class="form-group">
                <label for="wronganswer1">Fout antwoord 1</label>
                <input type="text" class="form-control" name="wronganswer1" id="wronganswer1"
                    placeholder="Voer het eerste foute antwoord in" value="{{old('wronganswer1')}}">
        </div>


            <div class="form-group">
                <label for="wronganswer2">Fout antwoord 2</label>
                <input type="text" class="form-control" name="wronganswer2" id="wronganswer2"
                   placeholder="Voer het tweede foute antwoord in" value="{{old('wronganswer2')}}">
            </div>

        <div class="form-group">
            <label for="wronganswer3">Fout antwoord 3</label>
            <input type="text" class="form-control" name="wronganswer3" id="wronganswer3"
                   placeholder="Voer het derde foute antwoord in" value="{{old('wronganswer3')}}">
        </div>

        <div class="form-group">
            <label for="quiz_id"></label>

            <select name="quiz_id" id="quiz_id" class="form-control">
                @foreach($quizzes as $quiz)
            <option value="{{ $quiz->id }}"
            @if(old('quiz_id') == $quiz->id)
                selected
                    @endif
            >{{ $quiz->name }}</option>


                @endforeach

            </select>

        </div>





        <button type="submit" name="AddQuestion">Vraag toevoegen</button>
        <button type="Submit" class="btn btn-primary" name="PublishQuiz">Submit</button>

    </form>
@endsection

