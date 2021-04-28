@extends('layouts.app')

@section('content')

	<div id="primery_window">
	<div class="for_position_top_line"></div>
	<div class="position_prim_action">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-12">
				<div class="primery_information_action">
					<div>
						@include('layouts.OurEvent')
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-5 col-sm-12">
				@include('layouts.sidebar')
			</div>
		
		</div>
	<div class="for_position_bottom_line"></div>
	</div>

	<div id="footer">
	@include('layouts.footer')
	</div>
@endsection
