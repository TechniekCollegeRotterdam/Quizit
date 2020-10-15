@extends('layouts.layout')

@section('content')


    <h1 class="mt-5">Design</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('designs.index') }}">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('designs.create') }}">Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('designs.show',
                        ['design' => $design->id]) }}">Design Details</a>
            </li>
        </ul>
    </nav>
    <div class="card-header">
        Design
    </div>
    <div class="card-body">
        <h2 class="card-title">{{ $design->name }}</h2>
        <h2 class="card-title">{{ $design->link }}</h2>
        <p class="card-text"><span class="text-info">Gemaakt: </span>{{$design->created_at->format('d-m-Y')}}</p>
        <p class="card-text"><span class="text-info">Bijgewerkt: </span>{{$design->updated_at->format('d-m-Y')}}</p>
    </div>
@endsection

