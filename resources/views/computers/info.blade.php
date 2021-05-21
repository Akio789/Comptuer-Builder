@extends('layouts.main')

@section('content')
<div class="title-banner"><h2 >Details of "{{ $computer->name }}" </h2></div>

<p>Id: {{ $computer->id }}</p>
<p>Name: {{ $computer->name }}</p>

<h2>Components</h2>
@foreach ($computer->components as $component)
    <p>{{ $component->name }}</p>
    <p>{{ $component->brand }}</p>
    <p>${{ $component->price }}</p>
    <hr />
@endforeach

<a href="{{ route('computers.index') }}">Go Back</a>
@endsection