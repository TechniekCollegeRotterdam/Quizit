@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Quiz-Player</h1>

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
    text komt hier
@endsection
