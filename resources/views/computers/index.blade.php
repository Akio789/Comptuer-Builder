@extends('layouts.main')

@section('content')
<!-- ESTO DEBE IR EN EL HEADER -->
<div style="display: flex">
    <div style= "background-color:#aeb6b0; border:1px solid black;  width: fit-content ;padding: 0px 5px 0px 5px">
        <a style="color: inherit" href="/logout">Logout</a>
    </div>
    <div style= "background-color:#aeb6b0; border:1px solid black;  width: fit-content;padding: 0px 5px 0px 5px ">
    <a style="color: inherit" href="{{ route('users.show', ['user' => Auth::user()->id]) }}">Profile</a>
    </div>
    <div style= "background-color:#aeb6b0; border:1px solid black;  width: fit-content;padding: 0px 5px 0px 5px ">
    <a style="color: inherit" href="{{ route('users.index') }}">List of users (In the future it will only be shown to admins)</a>
    </div>
    <div style= "background-color:#aeb6b0; border:1px solid black;  width: fit-content;padding: 0px 5px 0px 5px ">
    <a style="color: inherit" href="{{ route('components.index') }}">List of Components (In the future it will only be shown to admins)</a>
    </div>
</div>


<!-- HASTA AQUI -->

<h1>Hello {{ Auth::user()->name }}</h1>
<h2>List of computers</h2>
<p>
    <a href="{{ route('computers.create') }}">Create a computer</a>
</p>
<table border="1px solid black">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <td>Components</td>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($computers as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                @foreach ($item->components as $component)
                <p>{{ $component->name }}</p>
                <form action="{{ route('computer.components.destroy', ['computer' => $item->id, 'component' => $component->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Remove</button>
                </form>
                @endforeach
                <a href="{{ route('computer.components.index', ['computer' => $item->id]) }}">See all</a>
            </td>
            <td>
                <a href="{{ route('computers.edit', ['computer' => $item->id]) }}"">Edit</a>
                <form action="{{ route('computers.destroy', ['computer' => $item->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
                <p>
                    <a href="{{ route('computers.show', ['computer' => $item->id]) }}">Info</a>
                </p>
                <p>
                    <a href="{{ route('computer.components.create', ['computer' => $item->id]) }}">Add components</a>
                </p>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection