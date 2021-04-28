@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_cabinet">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
		<h1 class="name_title_cabinet">Анкетні дані рефералів власної рефкоманди (обмежені)</h1>

		<div class="block_my_icon">
			<div class="My_block_for_referral My_block_for_referral_VipUser" >
				<div class="My_block_top_bgc_block_referral_first" >
					<div class="My_block_img_user_referral"></div>
					<div class="My_block_name_user_referral">{{ Auth::user()->name }}</div>
					<div style="clear: both;"></div>
				</div>
			</div>
			<div style="clear: both;"></div>
		</div>
		
			


		<div class="your_structure_referral">

	@include('layouts.referrel.referralForm')

			<div style="clear: both;"></div>
			<div id="hint"></div>
		</div>


      </div>

      <div class="col-lg-4 col-md-12 col-sm-12 ">
        <div class="click_chat">Ч<br>А<br>Т</div>
        <div id="">
          @include('layouts.chat')
        </div>
      </div>

  	</div>
	</div>
  <div class="for_position_bottom_line"></div>
</div>


  <div id="footer">
  @include('layouts.footer')
  </div>
@endsection

