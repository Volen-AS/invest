@if(count($referrals))

 @foreach($referrals as $referral)

        @if($referral->referred_by == $referral->reSendTo)
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

        @else
           <div class="for_pos_block_transition_referral">
             <div class="block_transition_referral" data-hint="Транзитний реферал">
              <div class="top_bgc_block_referral_first">
               <div class="transition_referral_img_user_referral"></div>
               <div class="name_user_referral">{{ $referral->user->name }}</div>
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
