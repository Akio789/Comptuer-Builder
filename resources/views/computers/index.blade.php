@extends('layouts.main')

@section('content')
<a href="/logout">Logout</a>
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