  
@extends('layouts.main')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header">
                <h2>Edit your account</h2>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
                <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input name="name" id="name" type="text" value="{{ $user->name }}" class="form-control" placeholder="name">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input name="email" id="email" type="text" value="{{ $user->email }}" class="form-control" placeholder="email">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="password" id="password" type="password" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
                        <input type="submit" value="Edit" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>
@endsection