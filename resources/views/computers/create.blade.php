  
@extends('layouts.main')

@section('content')
<h1>Create your coin here</h1>
<form action="{{ route('computers.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="text">
    </div>
    <div>
        <input type="submit" value="Store">
    </div>
</form>
@endsection