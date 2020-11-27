@extends('Layouts.layout')

@section('content')

    @foreach($quiz as $quiz)
        <h1 class="text-info">{{$quiz->name}}</h1>
    @endforeach

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session('wrong'))
        <div class="alert-danger">
            {{ session('wrong') }}
        </div>
    @endif

        <h1>{{$question[0]->question}}</h1>

    <form method="POST" action="{{ route('gameAnswer.store') }}">
        @csrf

        <div class="form-group">
            <label for="game_id" hidden>Game</label>
            <textarea type="text" class="form-control" name="game_id" id="game_id"
                      placeholder="game id" disabled hidden>{{$game}}</textarea>
        </div>

{{--        <p>{{$game}}</p>--}}


        @foreach($answers as $answer)
            <button  class="btn btn-primary" type="submit" id="answer_id" name="answer_id" value="{{$answer->id}}"> {{$answer->answer}}</button>
        @endforeach

{{--        <p>{{dd($answer)}}</p>--}}



    </form>

@endsection


