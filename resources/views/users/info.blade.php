@extends('layouts.main')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header">
				<h2>{{ $user->name }}'s Profile</h2>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
                <div class="card-text">
                    <h3>Email: {{ $user->email }}</h3>
                </div>
                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-labeled btn-success btn-info">Delete Account</button>
                </form>
                <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                    <p class="button-div">
                        <button type="button" class="btn btn-labeled btn-success btn-info" >
                            Edit
                        </button>
                    </p>
                </a>
			</div>
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>


@endsection