@extends('Layouts.layout')

@section('content')
    <h1 class="mt-5">Gebruiker: <span class="text-info">{{$user->name}}</span><h1>

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



    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('user.index') }}">Index</a>
            </li>
            <li class="nav-item">
                <a href="/generate-user-pdf">Maak Pdf</a>
            </li>

        </ul>
    </nav>

    <table class="table .table-striped">
        <thead class="thead-dark">
        <th><h2 class="text-center text-info">Gebruiker</h2></th>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">E-mail</th>
            <th scope="col">Aangemaakt</th>
            <th scope="col">Layout</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{$design[0]->name}} </td>
            </tr>
        </tbody>
    </table>



    <table class="table .table-striped">
        <thead class="thead-dark">
        <th><h2 class="text-center text-info">Games</h2></th>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Omschrijving</th>
            <th scope="col">Quiz Aanmaak datum</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quiz as $quiz_info)
        <tr>
            <td scope="row">{{ $quiz_info->name }}</td>
            <td>{{ $quiz_info->description }}</td>
            <td>{{ $quiz_info->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
