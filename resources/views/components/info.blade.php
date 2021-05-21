@extends('layouts.main')

@section('content')
<h1>Detail of {{ $component->name }}</h1>
<p>Name: {{ $component->name }}</p>
<p>Brand: {{ $component->brand }}</p>
<p>Price: ${{ $component->price }}</p>

<a href="{{ route('components.index') }}">Go Back</a>
@endsection