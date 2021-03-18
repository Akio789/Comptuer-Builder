@extends('layouts.main')

@section('content')
<div class="title-banner"><h2>List of users</h2></div>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th >#</th>
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
            <div class="table-buttons">
                <form action="{{ route('users.destroy', ['user' => $item->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p class="button-div">
                    <button type="submit" class="btn btn-labeled btn-success" >
                        <span class="btn-label">
                            <i class="fas fa-trash"></i>
                        </span>
                        Delete
                    </button>
                    </p>
                </form>
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection