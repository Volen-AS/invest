@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_cabinet">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">

       <h1 class="name_title_cabinet">Таблиця власних токенів по періодах емісії</h1>

       <div class="table_own_token">
         <table>
           <tr>
             <td colspan="3" rowspan="3">Дата: <br>Вартість токенів</td>
             <td></td>
             <td>Загальна сума інвестицій, $</td>
             <td></td>
             <td>Загальна кількість токенів, шт</td>
             <td></td>
             <td></td>
           </tr>
           <tr>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
           </tr>
           <tr>
             <td></td>
             <td>{{$sum_invest}}</td>
             <td></td>
             <td>{{$sum_token}}</td>
             <td></td>
             <td></td>
           </tr>
           <tr>
             <td></td>
           </tr>

           @if(count($table_own_tokens))

             @foreach($table_own_tokens as $table_own_token)

               <tr class="tr_table_own_token">
                 <td>{{Carbon\Carbon::parse($table_own_token->date)->format('m-Y')}}</td>
                 <td></td>
                 <td>{{$table_own_token->token_rate}}</td>
                 <td></td>
                 <td>{{$table_own_token->investment}}</td>
                 <td></td>
                 <td>{{$table_own_token->own_token}}</td>
                 <td></td>
                 <td><button id="balance_own_token_em" data-date_by_emission="{{Carbon\Carbon::parse($table_own_token->date)->format('m-Y')}}"
                             data-token_rate_by_emission="{{$table_own_token->token_rate}}"
                             data-investment_by_emission="{{$table_own_token->investment}}"
                             data-own_token_by_emission="{{$table_own_token->own_token}}"
                             data-total_token_in_auction="{{$table_own_token->total_token_in_auction}}"
                             class="balance_own_token">Баланс</button></td>
               </tr>

             @endforeach
           @else
           @endif
         </table>
       </div>


        <div id="table_create_lot" class="table_create_lot">
          <table>
            <tr>
              <td>Період емісії</td>
              <td id="date_by_emission_md" value=""></td>
              <td></td>
            </tr>
            <tr>
              <td>Вартість емісії, $</td>
              <td id="token_rate_on_auction"></td>
              <td></td>
            </tr>
            <tr>
              <td>Загальна кількість токенів, шт.</td>
              <td id="total_amount_of_tokens"></td>
              <td></td>
            </tr>
            <tr>
              <td>Загальна сума, $</td>
              <td id="total_invest_of_emission"></td>
              <td></td>
            </tr>
            <tr>
              <td>Задіяно токенів в аукціоні, шт.</td>
              <td id="token_in_auction"></td>
              <td></td>
            </tr>
            <tr>
              <td>Доступна кількість токенів, шт.</td>
              <td id="available_amount"></td>
              <td></td>
            </tr>
            <tr>
              <td>Розмір мінімального лота, шт.</td>
              <td id="min_lot_auction" data-min_lot="{{$min_lot}}">{{$min_lot}}</td>
              <td></td>
            </tr>
            <tr>
              <td>Виставити токенів на аукціон, шт.</td>
              <td><input id="input_numb_create_lot" class="input_numb_create_lot" type="number" step="0.01"min="{{$min_lot}}"></td>
              <td><button id="bututono" class="button_pos_modal_activLot">Розрахувати</button></td>
            </tr>
            <tr>
              <td>Стартова ціна лоту, $</td>
              <td id="start_price_for_new_lot"></td>
              <td></td>
            </tr>
            <tr>
              <td>Залишок незадіяних токенів, шт.</td>
              <td id="available_token_in_create_lot"></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td><button id="confirm_create_lot" class="button_pos_modal_activLot">Створити лот</button></td>
            </tr>
          </table>
        </div>

        <div id="modal_confirm_create_lot">
          <div class="content_confirm_create_lot">
              <div class="content_confirmation_myModal">
                <table>
                  <div class="table_create_lot_confirm"><span style="text-decoration: underline;">Створити лот</span><br>
                    Будь ласка, зробіть вибір для підтвердження створення лоту і розміщення його на аукціоні?</div>
                  <div class="clear_div_1_confirmation_myModal" ></div>
                  <div class="clear_div_2_confirmation_myModal"></div>
                  <div id="btn_confirmation_myModal_no" class="btn_confirmation_myModal_no">НІ</div>
                  <div class="clear_div_3_confirmation_myModal"></div>
                  <div id="btn_confirmation_myModal_yes" class="btn_confirmation_myModal_yes">ТАК</div>
                </table>
              </div>
          </div>
        </div>

        <div id="new_lot_on_auction" class="confirmation-modal-window-actionLot">
          <div class="content_confirmation_bougth">
            <p></p>
          </div>
        </div>


          <div id="your_leader_lot">
              <div class="your_leader_lot">
                  <div class="content_your_leader_lot">
                      <p>Вітаємо! Ви встановили нову лідируючу ставку в лоті № 455555567.</p>
                      <p>Перебування лота га аукціоні завершується __.__.2019р в (год).(хв).(сек).</p>
                      <p>На Вашому особовому рахунку доступна сума в розмірі …. $</p>
                      <div id="btn_OK_your_leader_lot">ТАК</div>
                  </div>
                  <div style="clear:both;"></div>
              </div>
          </div>



       </div>

      <div class="col-lg-4 col-md-12 col-sm-12 ">
        @include('layouts.chat')
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
<script src="{{ URL::asset('js/lot.js') }}"></script>
