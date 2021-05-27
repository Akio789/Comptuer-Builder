@extends('layouts.main')

@section('content')
<div class="title-banner"><h2 >List of computers</h2></div>
<a href="{{ route('computers.create') }}"  >
    <p class="button-div">
    <button type="button" class="btn btn-labeled btn-success" dusk="NC">
        New Computer
    </button>
    </p>
</a>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Components</th>
            <th scope="col">Total Price</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($computers as $item)
        <tr>
            <td scope="row">{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <div class="component">
                    <p>Mohterboard: {{ $item->motherboard ? $item->motherboard->name : 'No motherboard' }}</p>
                </div>
                @foreach ($item->components as $component)
                <div class="component">
                    <p>{{ $component->name }}</p>
                    <form action="{{ route('computer.components.destroy', ['computer' => $item->id, 'component' => $component->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-labeled btn-success">Remove</button>
                    </form>
                </div>
                @endforeach
               <!-- <a href="{{ route('computer.components.index', ['computer' => $item->id]) }}">See all</a> -->
            </td>
            <td>$ {{ $item->total_price }}</td>
            <td>
                <div class="table-buttons">
                    <form action="{{ route('computers.publish', ['computer' => $item->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <p class="button-div">
                            <button type="submit" class="btn btn-labeled btn-success" >
                                <span class="btn-label">
                                    <i class="fas fa-edit"></i>
                                </span>
                                {{ $item->is_public ? 'Make private' : 'Make public' }}
                            </button>
                            </p>
                    </form>
                    <form action="{{ route('computers.destroy', ['computer' => $item->id]) }}" method="POST">
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
                    <a href="{{ route('computers.edit', ['computer' => $item->id]) }}">
                        <p class="button-div">
                        <button type="button" class="btn btn-labeled btn-success" >
                            <span class="btn-label">
                                <i class="fas fa-edit"></i>
                            </span>
                            Edit
                        </button>
                        </p>
                    </a>
                    <!--<a href="{{ route('computers.show', ['computer' => $item->id]) }}">
                        <p class="button-div">
                        <button type="button" class="btn btn-labeled btn-success" >
                            <span class="btn-label">
                                <i class="fas fa-info"></i>
                            </span>
                            Info
                        </button>
                        </p>
                    </a>-->
                    <a href="{{ route('computer.components.create', ['computer' => $item->id]) }}">
                        <p class="button-div">
                        <button type="button" class="btn btn-labeled btn-success" dusk="AddC" >
                            <span class="btn-label">
                                <i class="fas fa-plus"></i>
                            </span>
                            Add Component
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