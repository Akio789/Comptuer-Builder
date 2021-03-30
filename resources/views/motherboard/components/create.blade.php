@extends('layouts.main')

@section('content')

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header">
				<h3>Add new slot</h3>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
            <form action="{{ route('slots.store') }}" method="POST">
                @csrf
					<input name="motherboard_id" id="motherboard_id" type="text" hidden value="{{ $motherboard->id }}">
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-microchip"></i></span>
						</div>
						<select name="component_type" id="component_type" class="form-control">
                            <option value="" selected disabled hidden>Select a component type</option>
                            @foreach ($components as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-desktop"></i></span>
						</div>
						<input name="quantity" id="quantity" type="number" class="form-control" placeholder="quantity" value="1">
					</div>
                    <div class="form-group">
						<input type="submit" value="Add" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>

@endsection