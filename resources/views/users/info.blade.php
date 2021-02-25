@extends('layouts.main')

@section('content')
<h1>{{ $user->name }}'s Profile</h1>
<p>Email: {{ $user->email }}</p>
<a href="{{ route('computers.index') }}">Go Back</a>
<form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button>Delete account</button>
</form>
<a href="{{ route('users.edit', ['user' => $user->id]) }}"">Edit</a>
@endsection