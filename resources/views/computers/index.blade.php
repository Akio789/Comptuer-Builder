@extends('layouts.main')

@section('content')
<!-- ESTO DEBE IR EN EL HEADER -->
<a href="/logout">Logout</a>
<a href="{{ route('users.show', ['user' => Auth::user()->id]) }}">Profile</a>
<!-- HASTA AQUI -->
<!-- ESTAS OPCIONES PROBABLEMENTE SOLO SE MOSTRARAN A LOS ADMINS -->
<a href="{{ route('users.index') }}">List of users (In the future it will only be shown to admins)</a>
<a href="{{ route('components.index') }}">List of Components (In the future it will only be shown to admins)</a>
<!-- HASTA AQUI -->
<h1>Hello {{ Auth::user()->name }}</h1>
<h2>List of computers</h2>
<p>
    <a href="{{ route('computers.create') }}">Create a computer</a>
</p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($computers as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <a href="{{ route('computers.edit', ['computer' => $item->id]) }}"">Edit</a>
                <form action="{{ route('computers.destroy', ['computer' => $item->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
                <a href="{{ route('computers.show', ['computer' => $item->id]) }}">Info</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection