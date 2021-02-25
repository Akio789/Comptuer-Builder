  
@extends('layouts.main')

@section('content')
<h1>Edit your account</h1>
<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="text" value="{{ $user->name }}">
    </div>
    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="text" value="{{ $user->email }}">
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password">
    </div>
    <div>
        <input type="submit" value="Edit">
    </div>
</form>
@endsection