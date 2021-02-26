@extends('layouts.main')

@section('content')
<a href="{{ route('computers.index') }}">Back to your computer list</a>
<h1>Hello {{ Auth::user()->name }}</h1>
<h2>List of components</h2>
<p>
    <a href="{{ route('components.create') }}">Create a component</a>
</p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Price</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($components as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->brand }}</td>
            <td>{{ $item->model }}</td>
            <td>${{ $item->price }}</td>
            <td>
                <a href="{{ route('components.edit', ['component' => $item->id]) }}"">Edit</a>
                <form action="{{ route('components.destroy', ['component' => $item->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
                <a href="{{ route('components.show', ['component' => $item->id]) }}">Info</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection