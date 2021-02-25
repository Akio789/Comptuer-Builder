@extends('layouts.main')

@section('content')
<h1>Adding component to {{ $computer->name }}</h1>
<h2>Current components</h2>
@foreach ($computer->components as $component)
    <p>Name: {{ $component->name }}</p>
    <p>Brand: {{ $component->brand }}</p>
    <p>Model: {{ $component->model }}</p>
    <p>Price: ${{ $component->price }}</p>
@endforeach
<form action="{{ route('computer.components.store', ['computer' => $computer->id]) }}" method="POST">
    @csrf
    <select name="component" id="component">
        <option value="" selected disabled hidden>Select a component</option>
        @foreach ($availableComponents as $component)
        <option value="{{ $component->id }}">{{ $component->name }}</option>
        @endforeach
    </select>
    <input type="submit" value="Add">
</form>

<a href="{{ route('computers.index') }}">Go Back</a>
@endsection