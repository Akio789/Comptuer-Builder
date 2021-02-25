@extends('layouts.main')

@section('content')
<h1>Detail of {{ $computer->name }}</h1>
<p>Id: {{ $computer->id }}</p>
<p>Name: {{ $computer->name }}</p>
<a href="{{ route('computers.index') }}">Go Back</a>
@endsection