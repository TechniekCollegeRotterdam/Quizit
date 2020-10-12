@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Design/Aanpassen</h1>


    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link" href="{{route('designs.index')}}">Index</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('designs.create')}}">Create</a>
            </li>
            <li>
                <a class="nav-link active">Aanpassen</a>
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

    <form method="POST" action="{{route('designs.update', ['design' => $design->id])}}">
        @method('put')
        @csrf

        <div class="form-group">
            <label for="name">
                Design name
            </label>
            <input type="text" class="form-control" name="name"
                   aria-describedby="designnameHelp" value="{{$design->name}}">
        </div>

        <div class="form-group">
            <label for="link">
                Design link
            </label>
            <input type="text" class="form-control" name="link"
                   aria-describedby="designlinkHelp" value="{{$design->link}}">
        </div>

        <button type="submit" class="btn-primary">Aanpassen</button>

    </form>

@endsection

