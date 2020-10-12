@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Designs/verwijderen</h1>


    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link" href="{{route('designs.index')}}">Index</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('designs.create')}}">Create</a>
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

    <form method="POST" action="{{route('designs.destroy', ['design' => $design->id])}}">
        @method('DELETE')
        @csrf

        <div class="form-group">
            <label for="name">
                Design naam
            </label>
            <input type="text" disabled="disabled" class="form-control" name="name"
                   aria-describedby="categorienameHelp" value="{{$design->name}}">
        </div>
        <button type="submit"  class="btn-danger">Delete</button>

    </form>

@endsection
