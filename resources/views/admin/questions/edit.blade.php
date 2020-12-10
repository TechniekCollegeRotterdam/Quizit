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
                   aria-describedby="nameHelp" placeholder="Voer de vraag in" value="{{old('question', $question->question) }}">
        </div>

        <div class="form-group">
            <label for="points">Punten</label>
            <input type="number" step="1" min="0" max="10" name="points" id="points" class="form-control"
                   aria-describedby="pointHelp" placeholder="Voer het aantal punten in voor deze vraag" value="{{old('points', $question->points)}}">
        </div>
       @php($i = 1)
@foreach($answers as $answer)
            <div class="form-group">
                <label for="{{ $answer->valid == 1 ? 'goodanswer' : 'wronganswer' . $i }}" class="{{ $answer->valid == 1 ? 'text-success' : 'text-danger' }}"><strong>{{ $answer->valid == 1 ? 'Goed antwoord' : 'Fout antwoord ' . $i }}</strong></label>
                <input type="text" class="form-control" name="{{ $answer->valid == 1 ? 'goodanswer' : 'wronganswer' . $i }}" id="{{ $answer->valid == 1 ? 'goodanswer' : 'wronganswer' . $i }}"
                       placeholder="Voer het eerste foute antwoord in" value="{{old( $answer->valid == 1 ? 'goodanswer' : 'wronganswer' . $i, $answer->answer)}}">
            </div>
     @if($answer->valid != 1 )
                @php ($i++)
            @endif
        @endforeach

{{--        <div class="form-group">--}}
{{--            <label for="goodanswer" class="text-success"><strong>Goed Antwoord</strong></label>--}}
{{--            <input type="text" class="form-control" name="goodanswer" id="goodanswer"--}}
{{--                   placeholder="Voer het goede antwoord in" value="{{old('goodanswer', $question->goodanswer)}}">--}}
{{--        </div>--}}



{{--        <div class="form-group">--}}
{{--            <label for="wronganswer2" class="text-danger"><strong>Fout antwoord 2</strong></label>--}}
{{--            <input type="text" class="form-control" name="wronganswer2" id="wronganswer2"--}}
{{--                   placeholder="Voer het tweede foute antwoord in" value="{{old('wronganswer2', $question->wronganswer2)}}">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="wronganswer3" class="text-danger"><strong>Fout antwoord 3</strong></label>--}}
{{--            <input type="text" class="form-control" name="wronganswer3" id="wronganswer3"--}}
{{--                   placeholder="Voer het derde foute antwoord in" value="{{old('wronganswer3', $question->wronganswer3)}}">--}}
{{--        </div>--}}
        <div class="form-group">
            <label for="quiz_id">Quiz_id</label>
            <select name="quiz_id" id="quiz_id" class="form-control">
            @foreach($quizzes as $quiz)
                <option value="{{ $quiz->id }}"
                @if(old('quiz_id',$question->quiz_id) == $quiz->id)
                    selected
                   @endif
                >{{ $quiz->id }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn-primary">Aanpassen</button>

    </form>

@endsection
