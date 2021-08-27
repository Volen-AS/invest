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

            @if($referrals->count())

            @foreach($referrals as $referral)
                    <div class="block_referral_referralForm" data-refForm="{{ $referral->user->id }}">
                        <div class="top_bgc_block_referral_first">
                            <div class="img_user_referral"></div>
                            <div class="name_user_referral">{{ $referral->user->name }}</div>
                            <div style="clear: both;"></div>
                        </div>
                        <div class="primery_inform_block_referral_first">
                            <div class="number_of_tokens_referral">
                                <div class="number_of_tokens_referral_left">Кількість викуплених токенів</div>
                                <div class="number_of_tokens_referral_right">{{ $referral->user->myTotals->sum('own_token') }}</div>
                                <div style="clear: both;"></div>
                            </div>
                            <div class="number_of_tokens_referral">
                                <div class="number_of_tokens_referral_left">Кількість рефералів</div>
                                <div class="number_of_tokens_referral_right">{{ $referral->user->referrals->count() }}</div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="table_referralForm" data-refForm="{{ $referral->user->id }}">
                        <table class="">
                            <tr>
                                <th colspan="3" style="font-size: 18px; text-align: center;">Анкетні дані реферала</th>
                            </tr>
                            <tr>
                                <td style="height: 7px;"></td>
                                <td style="width: 2%;"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Реєстраційний номер</td>
                                <td></td>
                                <td>{{ $referral->user->id }}</td>
                            </tr>
                            <tr>
                                <td>Нік</td>
                                <td></td>
                                <td>{{ $referral->user->name }}</td>
                            </tr>
                            <tr>
                                <td>ФІО</td>
                                <td></td>
                                <td>{{ $referral->user->profile->first_name ?? ''}} {{ $referral->user->profile->second_name ?? '' }} {{ $referral->user->profile->last_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td></td>
                                <td>{{ $referral->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Телефон</td>
                                <td></td>
                                <td>{{ $referral->user->profile->phone_number ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Skype</td>
                                <td></td>
                                <td>{{ $referral->user->profile->skype ?? '' }}</td>
                            </tr>
                        </table>
                    </div>
            @endforeach
          @else

             <div> У вас поки що немає рефералів</div>

          @endif







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

