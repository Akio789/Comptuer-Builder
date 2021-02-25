@extends('layouts.main')

@section('content')
<h1>Welcome</h1>
<a href="{{ route('users.create') }}">Create a new account</a>
<a href="/login">Login</a>
@endsection