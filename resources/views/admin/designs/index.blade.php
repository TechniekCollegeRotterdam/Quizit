@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Designs</h1>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link  active" href="{{ route('designs.index') }}">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('designs.create') }}">Create
                </a>
            </li>
        </ul>
    </nav>

    <table class="table .table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Design</th>
            <th scope="col">link</th>
            <th scope="col">Design details</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($designs as $design)
            <tr>
                <td scope="row">{{ $design->id }}</td>
                <td>{{ $design->name }}</td>
                <td>{{ $design->link }}</td>
                <td><a href="{{ route('designs.show', ['design' => $design->id]) }}">Details</a></td>
                <td><a href="{{ route('designs.edit', ['design' => $design->id]) }}">Edit</a></td>
                <td><a href="{{ route('designs.delete', ['design' => $design->id]) }}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

