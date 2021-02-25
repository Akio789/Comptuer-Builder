@extends('layouts.main')

@section('content')
<h1>List of component of {{ $computer->name }}</h1>
@foreach ($components as $component)
    <p>Name: {{ $component->name }}</p>
    <p>Brand: {{ $component->brand }}</p>
    <p>Model: {{ $component->model }}</p>
    <p>Price: ${{ $component->price }}</p>
    <hr />
@endforeach
<a href="{{ route('computers.index') }}">Go Back</a>
@endsection