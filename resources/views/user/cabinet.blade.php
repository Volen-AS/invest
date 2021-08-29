@extends('layouts.app')
@section('content')
  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_cabinet">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
       <h1 class="name_title_cabinet">Кабінет</h1>

        <div class="action_and_news_cabinet">

          <div class="action_cabinet">
           <div class="top_bgc_block_sidebar_cabinet">Акції</div>
            <div class="content_block_cabinet">

            </div>
          </div>

          <div class="news_cabinet">
           <div class="top_bgc_block_sidebar_cabinet">Новини</div>
            <div class="content_block_cabinet">

            </div>
          </div>
          <div style="clear: both;"></div>
        </div>

      <div class="table_no_active_lot">
          @include('layouts.finances.Own_tokens_by_emission periods')
      </div>

       <div class="table_no_active_lot">
        @include('layouts.Auction.passivLot')
       </div>

      <div class="table_active_lot">
          @include('layouts.Auction.activLot')
      </div>

      <div class="about_referral_cabinet">
         <div class="top_bgc_block_sidebar_cabinet">Фінансова активність рефкоманди</div>
          <div class="content_referral_block_cabinet">
            <div class="lot_nomber_cabinet1"></div>
            <div class="lot_nomber_cabinet2"></div>
            <div class="lot_nomber_cabinet3"></div>
          </div>
          <div class="detail_referral_block_cabinet"><a href="#">Детальніше...</a></div>
      </div>

      </div>

        <div class="col-lg-4 col-md-12 col-sm-12 ">
            @include('layouts.chat')
        </div>


      <div class="your_statistic_cabinet">
        <table>
          <tr>
            <td colspan="3">Статистичні дані</td>
          </tr>
          <tr>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td >Вільні кошти (відображаються у вибраній валюті) (незадіяні в аукціоні)</td>
            <td></td>
            <td id="balance_in_cabinet">{{ $statistics->total_balance ?? 0 }}</td>
          </tr>
          <tr>
            <td>Кошти, задіяні в аукціоні в ставках на покупку токенів</td>
            <td></td>
            <td>{{$fundsInvolved}}</td>
          </tr>
          <tr>
            <td>Кількість токенів, виставлених на продаж</td>
            <td></td>
            <td>{{$tokenInAuction}}</td>
          </tr>
          <tr>
            <td>Інвестиційна винагорода (нараховані дивіденди)</td>
            <td></td>
            <td>0</td>
          </tr>
          <tr>
            <td>Реферальна винагорода (нараховані кошти від транзакцій купівлі-продажу токенів всередині власної реферальної команди)</td>
            <td></td>
            <td>{{$referralReward}}</td>
          </tr>
          <tr>
            <td>Відсоток власних токенів (від загальної кількості випущених)</td>
            <td></td>
            <td>{{$my_per_cent_of_token}}%</td>
          </tr>
          <tr>
            <td>Загальна кількість власних токенів</td>
            <td></td>
            <td id="token_total_balance">{{$sum_token}}</td>
          </tr>
        </table>
      </div>

      <div class="sidebar_menu">
          <a href="{{url('cabinet/finances/replenishment')}}"><div><i class="img_sidebar_menu1"></i>Поповнити рахунок</div></a>
          <a href="#"><div><i class="img_sidebar_menu2"></i>Вивести кошти на гаманець</div></a>
          <a href="#"><div><i class="img_sidebar_menu3"></i>Перерахувати</div></a>
          <a href="{{url('cabinet/tokens/ownTokens')}}"><div><i class="img_sidebar_menu4"></i>Створити лот</div></a>
          <a href="#"><div><i class="img_sidebar_menu5"></i>Зробити ставку</div></a>
          <a id="pay_token_cabinet"><div><i class="img_sidebar_menu5"></i>Купити токени</div></a>
          <span style="clear: both;"></span>
      </div>
        <div id="myModal" class="modal-window-buy-token">
            <div class="content_modal_buy_token">
                <table>
                    <tr>
                        <td>Вартість токена, $</td>
                        <td id="token_price_to_day" data-token_price_to_day="{{$getRateTokenToday}}">{{$getRateTokenToday}}</td>
                    </tr>
                    <tr>
                        <td>Сума покупки, $</td>
                        <td><input id="buyNewToken" class="number_modal_buy_token" placeholder="{{ $statistics->total_balance }}" step="0.01" type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button id="cal_token" class="button_pos_modal_activLot">Розрахувати</button></td>
                    </tr>
                    <tr>
                        <td>Нараховано токенів, шт.</td>
                        <td id="my_new_token">0.00</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="button_pos_modal_activLot" id="buy_lot_actionLot">Купити</button></td>
                    </tr>
                </table>
            </div>
        </div>


        <div id="confirmation_myModal" class="confirmation-modal-window-actionLot">
            <div class="content_confirmation_myModal">
                <table>
                    <div style="width: 100%; border: 1px solid #C0C0C0; padding: 5px;">Будь ласка, зробіть вибір. Ви підтверджуєте купівлю вказаної кількості токенів?</div>
                    <div class="clear_div_1_confirmation_myModal" ></div>
                    <div class="clear_div_2_confirmation_myModal"></div>
                    <div id="btn_confirmation_myModal_no" class="btn_confirmation_myModal_no">НІ</div>
                    <div class="clear_div_3_confirmation_myModal"></div>
                    <div id="btn_confirmation_myModal_yes" class="btn_confirmation_myModal_yes">ТАК</div>
                </table>
            </div>
        </div>

        <div id="you_bougth_new_token" class="confirmation-modal-window-actionLot">
            <div class="content_confirmation_bougth">
                <p>Вітаємо, токени нараходвані</p>
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

<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>

<script src="{{ URL::asset('js/window.js') }}"></script>


