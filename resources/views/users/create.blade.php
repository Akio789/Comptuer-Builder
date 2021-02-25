  
@extends('layouts.main')

@section('content')
<h1>Create a new account</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="text">
    </div>
    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="text">
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password">
    </div>
    <div>
        <input type="submit" value="Register">
    </div>
</form>
@endsection