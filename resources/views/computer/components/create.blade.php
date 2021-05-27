@extends('layouts.main')

@section('content')

<div class="container component-container">
	<div class="d-flex justify-content-center">
		<div class="card card-components">
			<div class="card-header">
				<h3>Add new component</h3>
				<div class="d-flex justify-content-end social_icon">
				</div>
			</div>
			<div class="card-body">
			<h4>Motherboard: {{ $motherboard->name }}</h4>
			
			<h4>Socket: {{ $motherboard->socket }}</h4>
			
            <form action="{{ route('computer.components.store', ['computer' => $computer->id]) }}" method="POST">
                @csrf
				@foreach ($remainingSlots as $key => $val)
				<div class="component-list">
					<h5>{{ $key }}</h5>
					@for ($i = 0; $i < $val; $i++)	
						<div class="input-group form-group input-components">
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
					@endfor
				</div>
				@endforeach
                    <div class="form-group">
						<input type="submit" value="Save" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>

@endsection