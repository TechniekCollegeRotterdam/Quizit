@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Quizzes</h1>

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
            <label for="question">Vraag</label>
            <input type="text" name="question" class="form-control" id="question"
                   aria-describedby="nameHelp" placeholder="Voer de vraag in" value="{{old('question')}}">
        </div>

        <div class="form-group">
            <label for="points">Punten</label>
            <input type="number" step="1" min="0" max="10" name="points" id="points" class="form-control"
            aria-describedby="pointHelp" placeholder="Voer het aantal punten in voor deze vraag" value="{{old('')}}">
        </div>

        <div class="form-group">
            <label for="description">Omschrijving</label>
            <textarea type="text" class="form-control" name="description" id="description"
                      placeholder="Voer een quiz omschrijving in">{{old('description')}}</textarea>
        </div>


        <button type="submit" name="AddQuestion">Vraag toevoegen</button>
        <button type="Submit" class="btn btn-primary" name="PublishQuiz">Submit</button>

    </form>
@endsection

