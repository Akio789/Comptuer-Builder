  
@extends('layouts.main')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header">
				<h3>Create new component</h3>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
            <form action="{{ route('components.store') }}" method="POST">
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
							<span class="input-group-text"><i class="fas fa-microchip"></i></span>
						</div>
						<input name="capacity" id="capacity" type="{{$capacityInputType}}" class="form-control" placeholder="{{$capacityInputPlaceholder}}">
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