@extends('layouts.main')

@section('content')
<div class="title-banner"><h2>Please select the type of component</h2></div>
<div class="container">
	<div class="justify-content-center p-5">
		<a href="{{ route('components.create', ['type' =>  'ram']) }}">
			<button type="button" class="m-2 btn btn-centered btn-labeled btn-success btn-info" >
				RAM
			</button>
		</a>
	</div>
</div>
@endsection