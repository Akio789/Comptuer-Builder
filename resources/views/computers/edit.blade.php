  
@extends('layouts.main')

@section('content')
<h1>Edit your computer here</h1>
<form action="{{ route('computers.update', ['computer' => $computer->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="text" value="{{ $computer->name }}">
    </div>
    <div>
        <input type="submit" value="Edit">
    </div>
</form>
@endsection