  
@extends('layouts.main')

@section('content')
@if (session('failed'))
  <p>Incorrect credentials</p>
@endif
<h1>Login</h1>
<form action="/login" method="POST">
    @csrf
    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="text">
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password">
    </div>
    <div>
        <input type="submit" value="Login">
    </div>
</form>
@endsection