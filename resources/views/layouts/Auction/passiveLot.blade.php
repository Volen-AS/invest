         <table id="table_for_No_actiov_lot">
          <tr>
            <td colspan="13">Неактивовані лоти</td>
          </tr>
          <tr>
            <td colspan="13"></td>
          </tr>
          <tr>
            <td style="width: 30%;">Код транзакції</td>
            <td></td>
            <td>Емісійний період</td>
            <td></td>
            <td>Кількість токенів</td>
            <td></td>
            <td style="width: 22%;">Старт лота, таймер</td>
            <td></td>
            <td style="width: 22%;">Пропозиція стартової ціни за лот/$</td>
            <td></td>
            <td style="width: 22%;">Перша ставка лоту/$</td>
            <td></td>
            <td>Зробити ставку</td>
          </tr>

     @if(count($not_actiov_lots))

         @foreach($not_actiov_lots as $not_actiov_lot)
                 <tr class="tr_for_No_actiov_lot" data-final_date_no_active_lot="{{$not_actiov_lot->final_date}}" data-token_em_price="{{$not_actiov_lot->token_em_price}}"
                 data-first_buyer="{{$not_actiov_lot->first_buyer}}" data-step_amount="{{$not_actiov_lot->min_bet}}" data-seller="{{$not_actiov_lot->seller_u_id}}">
                     <td>{{$not_actiov_lot->code_transaction_au}}</td>
                     <td></td>
                     <td>{{\Carbon\Carbon::parse($not_actiov_lot->emission_period)->format('m-Y')}}</td>
                     <td></td>
                     <td>{{$not_actiov_lot->amount_token_lot}}</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>{{$not_actiov_lot->start_price}}</td>
                     <td></td>
                     <td>{{$not_actiov_lot->first_price_lot['bet_amount'] ?? null}}</td>
                     <td></td>
                     <td><button class="buttom_table_money_cabinet_pass">Зробити ставку</button></td>
                 </tr>
         @endforeach
         </table>
     @else
           <table>
               <tr>
                   <td>не має виставлених лотів</td>
               </tr>
           </table>
     @endif

         <div id="selected_pass_lot" class="you_selected_lot">
             <div class="you_selected_lot_content">
                 <div id="close_model_windows_pass" class="close_model_windows"></div>
                 <table>
                     <tr>
                         <td colspan="4">Ви обрали лот №<div id="code_transaction_noAct_lot"></div></td>
                     </tr>
                     <tr>
                         <td colspan="4"><div class="token_amount_in_tb_noAct"><div class="token_amount_in_tb_noAct_possition">Кількість токенів,шт –</div><div id="tb_bet_token_amount" class="token_amount_in_tb_noAct_possition"></div></div><br>
                             <div class="token_amount_in_tb_noAct">
                                 <div class="token_amount_in_tb_noAct_possition">Емісійна вартість токена,$  –</div>
                                 <div id="tb_bet_tokeт_emission" class="token_amount_in_tb_noAct_possition"> </div>
                             </div><br>

                             <div class="token_amount_in_tb_noAct">
                                 <div class="token_amount_in_tb_noAct_possition">Стартова ціна лота,$ –</div>
                                 <div id="tb_bet_start_price" class="token_amount_in_tb_noAct_possition"></div>
                             </div><br>

                             <div class="token_amount_in_tb_noAct">
                                 <div class="token_amount_in_tb_noAct_possition">Лідируюча ставка,$ – </div>
                                 <div id="tb_bet_first_bet" class="token_amount_in_tb_noAct_possition"></div>
                             </div>
                         </td>
                     </tr>
                     <tr>
                         <td colspan="4">Щоб перебити ставку, введіть в поле вводу суму, більшу ніж,$ <div id="step_amount_auction"></div>
                         </td>
                     </tr>
                     <tr>
                         <td>Сума на вашому особовому рахунку, $</td>
                         <td id="you_can_spend_on_auction"></td>
                         <td>Зробити ставку, $</td>
                         <td><input id="input_auction_bet" type="number" min="0"></td>
                     </tr>
                     <tr>
                         <td colspan="4"> <button id="noAcr_bet_lot">Зробити ставку</button></td>
                     </tr>
                 </table>
             </div>
         </div>

         <div id="modal_confirm_bet_pass">
             <div class="content_confirm_create_lot">
                 <div class="content_confirmation_myModal">
                     <table>
                         <div id="table_bet_text_confirm" class="table_create_lot_confirm"><span style="text-decoration: underline;">Зробити ставку</span><br>
                             Підтвердити створення ставки?</div>
                         <div class="clear_div_1_confirmation_myModal" ></div>
                         <div class="clear_div_2_confirmation_myModal"></div>
                         <div id="press_no_lot_bet_pass" class="btn_confirmation_myModal_no">НІ</div>
                         <div class="clear_div_3_confirmation_myModal"></div>
                         <div id="press_yes_lot_bet_pass" class="btn_confirmation_myModal_yes">ТАК</div>
                     </table>
                 </div>
             </div>
         </div>


         <script src="https://code.jquery.com/jquery-3.4.0.min.js"
                 integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
                 crossorigin="anonymous"></script>

         <script src="{{ URL::asset('js/countdown_no_action_lot.js') }}"></script>
         <script src="{{ URL::asset('js/to_bet.js') }}"></script>
