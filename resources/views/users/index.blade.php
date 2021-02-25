@extends('layouts.main')

@section('content')
<a href="{{ route('computers.index') }}">Back to your computer list</a>
<h1>Hello {{ Auth::user()->name }}</h1>
<h2>List of users</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <form action="{{ route('users.destroy', ['user' => $item->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection