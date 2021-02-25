@extends('layouts.main')

@section('content')
<h1>Detail of {{ $computer->name }}</h1>
<p>Id: {{ $computer->id }}</p>
<p>Name: {{ $computer->name }}</p>

<h2>Components</h2>
@foreach ($computer->components as $component)
    <p>{{ $component->name }}</p>
    <p>{{ $component->brand }}</p>
    <p>{{ $component->model }}</p>
    <p>${{ $component->price }}</p>
    <hr />
@endforeach

<a href="{{ route('computers.index') }}">Go Back</a>
@endsection