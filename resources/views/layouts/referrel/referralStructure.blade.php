@if(count($referrals_full_datas))

    @foreach($referrals_full_datas as $referrals_full_data)


        @if($referrals_full_data['0']->referred_by == $referrals_full_data['0']->reSendTo)

			<div class="block_referral_first" data-refStru="{{ $referrals_full_data['3']->email }}">


				<div class="top_bgc_block_referral_first">

					<div class="img_user_referral"></div>
					<div class="name_user_referral">{{ $referrals_full_data['3']->name }}</div>
					<div style="clear: both;"></div>
				</div>
				<div class="primery_inform_block_referral_first">
					<div class="number_of_tokens_referral">
						<div class="number_of_tokens_referral_left">Кількість викуплених токенів</div>
						<div class="number_of_tokens_referral_right">{{ $referrals_full_data['1'] }}</div>
						<div style="clear: both;"></div>
					</div>
					<div class="number_of_tokens_referral">
						<div class="number_of_tokens_referral_left">Кількість рефералів</div>
						<div class="number_of_tokens_referral_right">{{ $referrals_full_data['2'] }}</div>
						<div style="clear: both;"></div>
					</div>
				</div>
			</div>

			<div class="transaction_referrals_table" data-refStru="{{ $referrals_full_data['3']->email }}">
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


		@else
			<div class="for_pos_block_transition_referral">
				<div class="block_transition_referral" data-hint="Транзитний реферал">
					<div class="top_bgc_block_referral_first">
						<div class="transition_referral_img_user_referral"></div>
						<div class="name_user_referral">(Ім'я реферала)</div>
						<div style="clear: both;"></div>
					</div>
					<div class="name_transit_referral">Транзитний реферал</div>
				</div>
			</div>
			<div id="hint"></div>
		@endif
	@endforeach

@else

 У вас поки що немає рефералів
@endif






