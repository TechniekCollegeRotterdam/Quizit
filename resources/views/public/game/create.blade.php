@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Game</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ route('game.store') }}">
        @csrf
        <div class="list-group-item">
            <label for="quiz_id">
                Selecteer de quiz die je wil spelen
            </label>
            <select name="quiz_id" id="quiz_id" class="form-control">
                @foreach($quizzes as $quiz)
                    <option value="{{$quiz->id}}"
                            @if(old('$quiz_id',$quiz->id)==$quiz->id)
                            selected
                        @endif
                    >{{$quiz->name}}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="user" hidden>Speler</label>
                <textarea hidden type="text" class="form-control" name="user" id="user"
                          placeholder="user" value="{{$user->id}}" disabled>{{$user->name}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Punten</label>
            <textarea type="text" class="form-control" name="description" id="description"
                      placeholder="points" value="0" disabled>{{old('description')}}</textarea>
        </div>

        <button type="Submit" class="btn btn-primary" name="PublishQuiz">Start de game</button>

    </form>
@endsection
