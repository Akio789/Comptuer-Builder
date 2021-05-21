  
@extends('layouts.main')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card h-100">
			<div class="card-header">
				<h3>Create new motherboard</h3>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
            <form action="{{ route('motherboards.store') }}" method="POST">
                @csrf
				<div class="input-group form-group">
					<select name="socket" id="socket" class="form-control">
						<option value="" selected disabled hidden>Select a socket type</option>
						@foreach ($types as $type)
						<option value="{{ $type }}">{{ $type }}</option>
						@endforeach
					</select>
				</div>
				<div class="input-group form-group">
					<select name="size" id="size" class="form-control">
						<option value="" selected disabled hidden>Select a size</option>
						@foreach ($sizes as $size)
						<option value="{{ $size }}">{{ $size }}</option>
						@endforeach
					</select>
				</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-microchip"></i></span>
						</div>
						<input name="name" id="name" type="text" class="form-control" placeholder="name">
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-building"></i></span>
						</div>
						<input name="brand" id="brand" type="text" class="form-control" placeholder="brand">
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
						</div>
						<input name="price" id="price" type="number" class="form-control" placeholder="price">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-barcode"></i></span>
						</div>
						<input name="max_memory" id="max_memory" type="text" class="form-control" placeholder="max_memory">
					</div>
                    <div class="form-group">
						<input type="submit" value="Store" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>
@endsection