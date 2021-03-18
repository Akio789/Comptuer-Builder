  
@extends('layouts.main')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header">
				<h3>Edit PC</h3>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
            <form action="{{ route('computers.update', ['computer' => $computer->id]) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-desktop"></i></span>
						</div>
						<input name="name" id="name" type="text" class="form-control" placeholder="name" value="{{ $computer->name }}">
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