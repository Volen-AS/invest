@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_cabinet">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
		<h1 class="name_title_cabinet">Структура власної рефкоманди</h1>

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

            @if(count($referrals))

                @foreach($referrals as $referral)

                        <div class="block_referral_first" data-refStru="{{ $referral->user->email }}">


                            <div class="top_bgc_block_referral_first">

                                <div class="img_user_referral"></div>
                                <div class="name_user_referral">{{ $referral->user->name }}</div>
                                <div style="clear: both;"></div>
                            </div>
                            <div class="primery_inform_block_referral_first">
                                <div class="number_of_tokens_referral">
                                    <div class="number_of_tokens_referral_left">Кількість викуплених токенів</div>
                                    <div class="number_of_tokens_referral_right"> {{ $referral->user->myTotals->sum('own_token') }} </div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="number_of_tokens_referral">
                                    <div class="number_of_tokens_referral_left">Кількість рефералів</div>
                                    <div class="number_of_tokens_referral_right"> {{ $referral->user->referrals->count() }} </div>
                                    <div style="clear: both;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="transaction_referrals_table" data-refStru="{{ $referral->user->email }}">
                            <table class="">
                                <tr>
                                    <td style="text-align: center; font-size: 20px;" colspan="9">Транзакції реферала</td>
                                </tr>
                                <tr>
                                    <td style="height: 7px;"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                <tr>
                                    <td>Час та <br>дата виконання</td>
                                    <td></td>
                                    <td>Ціна</td>
                                    <td></td>
                                    <td>Валюта</td>
                                    <td></td>
                                    <td>Об'єм</td>
                                    <td></td>
                                    <td>Торгівельна вартість *</td>

                                </tr>
                                <tr>
                                    <td>08:29:46 10-May-19</td>
                                    <td></td>
                                    <td>17,120</td>
                                    <td></td>
                                    <td>USD</td>
                                    <td></td>
                                    <td>6,000</td>
                                    <td></td>
                                    <td>67,200.00</td>

                                </tr>
                                <tr>
                                    <td>08:29:46 10-May-19</td>
                                    <td></td>
                                    <td>1,120</td>
                                    <td></td>
                                    <td>EUR</td>
                                    <td></td>
                                    <td>6,000</td>
                                    <td></td>
                                    <td>67,456.00</td>

                                </tr>
                                <tr>
                                    <td>08:29:46 10-May-19</td>
                                    <td></td>
                                    <td>13,434</td>
                                    <td></td>
                                    <td>RUB</td>
                                    <td></td>
                                    <td>6,000</td>
                                    <td></td>
                                    <td>5,200.00</td>

                                </tr>
                                <tr>
                                    <td>08:29:46 10-May-19</td>
                                    <td></td>
                                    <td>17,456</td>
                                    <td></td>
                                    <td>AED</td>
                                    <td></td>
                                    <td>6,000</td>
                                    <td></td>
                                    <td>6,200.00</td>

                                </tr>
                                <tr>
                                    <td>08:29:46 10-May-19</td>
                                    <td></td>
                                    <td>109</td>
                                    <td></td>
                                    <td>GBP</td>
                                    <td></td>
                                    <td>6,000</td>
                                    <td></td>
                                    <td>500.00</td>

                                </tr>
                            </table>
                            <div style="clear: both;"></div>
                        </div>

                @endforeach

            @else

                У вас поки що немає рефералів
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

