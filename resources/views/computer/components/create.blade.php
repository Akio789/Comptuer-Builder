@extends('layouts.main')

@section('content')

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header">
				<h3>Add new component</h3>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
			Motherboard: {{ $motherboard->name }}
			<br />
			Socket: {{ $motherboard->socket }}
			<br />
			@foreach ($remainingSlots as $key => $val)
			{{ $val }} {{ $key }} left
			<br />			
			@endforeach
            <form action="{{ route('computer.components.store', ['computer' => $computer->id]) }}" method="POST">
                @csrf
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-microchip"></i></span>
						</div>
						<select name="component" id="component" class="form-control">
                            <option value="" selected disabled hidden>Select a component</option>
                            @foreach ($availableComponents as $component)
                            <option value="{{ $component->id }}">{{ $component->name }}</option>
                            @endforeach
                        </select>
                        
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