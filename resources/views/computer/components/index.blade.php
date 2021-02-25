@extends('layouts.main')

@section('content')
<h1>List of component of {{ $computer->name }}</h1>
@foreach ($components as $component)
    <p>Name: {{ $component->name }}</p>
    <p>Brand: {{ $component->brand }}</p>
    <p>Model: {{ $component->model }}</p>
    <p>Price: ${{ $component->price }}</p>
    <form action="{{ route('computer.components.update', ['computer' => $computer->id, 'component' => $component->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="component">Change component</label>
            <select name="component" id="component">
                <option value="" selected disabled hidden>Select a component</option>
                @foreach ($availableComponents as $component)
                <option value="{{ $component->id }}">{{ $component->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="Edit">
        </div>
    </form>
    <hr />
@endforeach
<a href="{{ route('computers.index') }}">Go Back</a>
@endsection