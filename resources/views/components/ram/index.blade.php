@extends('layouts.main')

@section('content')
<div class="title-banner"><h2>List of RAMs</h2></div>
<a href="{{ route('components.create', ['type' =>  'ram']) }}">
    <p class="button-div">
    <button type="button" class="btn btn-labeled btn-success" >
        <span class="btn-label">
            <i class="fas fa-plus"></i>
        </span>
        New Ram
    </button>
    </p>
</a>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Socket</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Speed</th>
            <th>Memory</th>
            <th>Price</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($components as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->socket }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->brand }}</td>
            <td>{{ $item->speed }}</td>
            <td>{{ $item->capacity }} GB</td>
            <td>${{ $item->price }}</td>
            <td>
                <div class="table-buttons">
                <form action="{{ route('components.destroy', ['component' => $item->id]) }}" method="POST">
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
                <a href="{{ route('components.edit', ['component' => $item->id, 'type' => 'ram']) }}"><p class="button-div">
                        <button type="button" class="btn btn-labeled btn-success" >
                            <span class="btn-label">
                                <i class="fas fa-edit"></i>
                            </span>
                            Edit
                        </button>
                        </p>
                        </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection