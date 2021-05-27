@extends('layouts.main')

@section('content')
<div class="title-banner"><h2>Please select the type of component</h2></div>
<div class="container">
	<div class="justify-content-center p-5">
		<a href="{{ route('components.list', ['type' =>  'ram']) }}">
			<button type="button" class="m-2 btn btn-centered btn-labeled btn-success btn-info btn-component" style="background: url('https://www.pcgamesn.com/wp-content/uploads/2017/12/Gskill_Trident_Z_RGB_RAM-900x506.jpg');" >
				RAM
			</button>
		</a>
		<a href="{{ route('components.list', ['type' =>  'cpu']) }}">
			<button type="button" class="m-2 btn btn-centered btn-labeled btn-success btn-info btn-component" style="background: url('https://concepto.de/wp-content/uploads/2014/08/CPU-e1551228076500.jpg');" >
				CPU
			</button>
		</a>
		<a href="{{ route('components.list', ['type' =>  'hdd']) }}">
			<button type="button" class="m-2 btn btn-centered btn-labeled btn-success btn-info btn-component" style="background: url('https://academy.avast.com/hubfs/New_Avast_Academy/SSD%20vs%20HDD/SSD_vs_HDD-which_should_you_buy-Thumb.png');" >
				HDD
			</button>
		</a>
		<a href="{{ route('components.list', ['type' =>  'ssd']) }}">
			<button type="button" class="m-2 btn btn-centered btn-labeled btn-success btn-info btn-component" style="background: url('https://media.kingston.com/kingston/hero/ktc-hero-ssd-types-of-nand-md.jpg');">
				SSD
			</button>
		</a>
		<a href="{{ route('components.list', ['type' =>  'cooler']) }}">
			<button type="button" class="m-2 btn btn-centered btn-labeled btn-success btn-info btn-component" style="background: url('https://cdn.mos.cms.futurecdn.net/6P2gyGKUrPLXCgGprv8Wfh.jpg');">
				Cooler
			</button>
		</a>
		<a href="{{ route('components.list', ['type' =>  'gpu']) }}">
			<button type="button" class="m-2 btn btn-centered btn-labeled btn-success btn-info btn-component" style="background: url('https://cdn.vox-cdn.com/thumbor/SEwxL1qWHjlDDQcL3zNYoFw9sWU=/0x0:2640x1749/1200x800/filters:focal(1109x664:1531x1086)/cdn.vox-cdn.com/uploads/chorus_image/image/69129616/twarren_rtx3080.0.jpg');">
				GPU
			</button>
		</a>
		<a href="{{ route('components.list', ['type' =>  'cabinet']) }}">
			<button type="button" class="m-2 btn btn-centered btn-labeled btn-success btn-info btn-component" style="background: url('https://5.imimg.com/data5/ZP/KM/GM/SELLER-38206118/df500-500x500-500x500.jpg');">
				Cabinet
			</button>
		</a>
		<a href="{{ route('components.list', ['type' =>  'power_supply']) }}">
			<button type="button" class="m-2 btn btn-centered btn-labeled btn-success btn-info btn-component" style="background: url('https://www.scan.co.uk/images/products/3213944-a.jpg');">
				Power supply
			</button>
		</a>
	</div>
</div>
@endsection