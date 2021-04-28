@if(count($referrals_full_datas))

 @foreach($referrals_full_datas as $referrals_full_data)


        @if($referrals_full_data['0']->referred_by == $referrals_full_data['0']->reSendTo)
    <div class="block_referral_referralForm" data-refForm="{{ $referrals_full_data['3']->u_id }}">
     <div class="top_bgc_block_referral_first">
      <div class="img_user_referral"></div>
      <div class="name_user_referral">{{ $referrals_full_data['4']->name }}</div>
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

   <div class="table_referralForm" data-refForm="{{ $referrals_full_data['3']->u_id }}">
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
               <td>{{ $referrals_full_data['3']->u_id }}</td>
             </tr>
             <tr>
               <td>Нік</td>
               <td></td>
               <td>{{ $referrals_full_data['4']->name }}</td>
             </tr>
             <tr>
               <td>ФІО</td>
               <td></td>
               <td>{{ $referrals_full_data['3']->first_name }} {{ $referrals_full_data['3']->second_name }} {{ $referrals_full_data['3']->last_name }}</td>
             </tr>
             <tr>
               <td>E-mail</td>
               <td></td>
               <td>{{ $referrals_full_data['4']->email }}</td>
             </tr>
             <tr>
               <td>Телефон</td>
               <td></td>
               <td>{{ $referrals_full_data['3']->phone_number }}</td>
             </tr>
             <tr>
               <td>Skype</td>
               <td></td>
               <td>{{ $referrals_full_data['3']->skype }}</td>
             </tr>
           </table>
         </div>

        @else
   <div class="for_pos_block_transition_referral">
     <div class="block_transition_referral" data-hint="Транзитний реферал">
      <div class="top_bgc_block_referral_first">
       <div class="transition_referral_img_user_referral"></div>
       <div class="name_user_referral">{{ $referrals_full_data['4']->name }}</div>
       <div style="clear: both;"></div>
      </div>
      <div class="name_transit_referral">Транзитний реферал</div>
     </div>
    </div>
  @endif




 @endforeach

@else

 У вас поки що немає рефералів
@endif
