  
@extends('layouts.main')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card h-100">
			<div class="card-header">
				<h3>Create new Cooler</h3>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
            <form action="{{ route('components.store', ['type' => 'cooler']) }}" method="POST">
                @csrf
				<div class="input-group form-group">
					<select name="socket" id="socket" class="form-control">
						<option value="" selected disabled hidden>Select a socket</option>
						@foreach ($sockets as $socket)
						<option value="{{ $socket }}">{{ $socket }}</option>
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
						<input name="capacity" id="capacity" type="text" class="form-control" placeholder="Fans RPM">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-microchip"></i></span>
						</div>
						<input name="noise" id="noise" type="text" class="form-control" placeholder="noise">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-building"></i></span>
						</div>
						<input name="size" id="size" type="text" class="form-control" placeholder="size">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-barcode"></i></span>
						</div>
						<input name="radiator" id="radiator" type="text" class="form-control" placeholder="radiator">
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