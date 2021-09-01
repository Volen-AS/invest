<table id="all_active_lot" data-token_rate_today="{{$rateTokenToday}}">
          <tr>
            <td colspan="17">Активовані лоти</td>
          </tr>
          <tr>
            <td colspan="17"></td>
          </tr>
          <tr>
            <td>Код транзакції</td>
            <td></td>
            <td>Емісійний період</td>
            <td></td>
            <td>Кількість токенів</td>
            <td></td>
            <td>Старт лота, таймер</td>
            <td></td>
            <td>Активація лота, таймер</td>
            <td></td>
            <td>Пропозиція стартової ціни за лот, шт./$.</td>
            <td></td>
            <td>Попередня позиція, шт./$.</td>
            <td></td>
            <td>Лідируюча позиція, шт./$.</td>
            <td></td>
            <td>Зробити ставку</td>
          </tr>

    @if(count($actiov_lots))
        @foreach($actiov_lots as $actiov_lot)
            <tr class="tr_for_actiov_lot" data-final_date_active_lot="{{$actiov_lot->final_date_act}}" data-toker_rate_act="{{$actiov_lot->toker_rate_act}}"
                data-step_amount_act="{{$actiov_lot->min_bet_act}}" data-seller_u_id="{{$actiov_lot->seller_u_id }}" data-previous_user="{{$actiov_lot->previous_price_user}}" data-lider_user="{{$actiov_lot->lider_price_user}}">
                <td>{{ $actiov_lot->code_transaction_au }}</td>
                <td></td>
                <td>{{\Carbon\Carbon::parse($actiov_lot->emission_period)->format('m-Y')}}</td>
                <td></td>
                <td>{{ $actiov_lot->amount_token_lot }}</td>
                <td></td>
                <td>{{ $actiov_lot->start_lot_time }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $actiov_lot->start_price }}</td>
                <td></td>
                <td>{{ $actiov_lot->previous_price['bet_amount'] ?? null}}</td>
                <td></td>
                <td>{{ $actiov_lot->lider_price['bet_amount'] ?? null}}</td>
                <td></td>
                <td><button class="buttom_table_money_cabinet_active">Зробити ставку</button></td>
            </tr>
        @endforeach
</table>
    @else
        <table>
            <tr>
                <td>не має активних лотів</td>
            </tr>
        </table>
    @endif

<div id="selected_act_lot" class="you_selected_lot">
    <div class="you_selected_lot_content">
        <div id="close_model_windows_act" class="close_model_windows"></div>
        <table>
            <tr>
                <td colspan="4">Ви обрали лот №<div id="code_transaction_act_lot"></div></td>
            </tr>
            <tr>
                <td colspan="4"><div class="token_amount_in_tb_noAct"><div class="token_amount_in_tb_noAct_possition">Кількість токенів,шт –</div><div id="tb_bet_token_amount_act" class="token_amount_in_tb_noAct_possition"></div></div><br>
                    <div class="token_amount_in_tb_noAct">
                        <div class="token_amount_in_tb_noAct_possition">Емісійна вартість токена,$  –</div>
                        <div id="tb_bet_tokeт_emission_act" class="token_amount_in_tb_noAct_possition"></div>
                    </div><br>

                    <div class="token_amount_in_tb_noAct">
                        <div class="token_amount_in_tb_noAct_possition">Попередня ставка,$ –</div>
                        <div id="tb_bet_previous_price_act" class="token_amount_in_tb_noAct_possition"></div>
                    </div><br>

                    <div class="token_amount_in_tb_noAct">
                        <div class="token_amount_in_tb_noAct_possition">Лідируюча ставка,$ – </div>
                        <div id="tb_bet_lider_prices" class="token_amount_in_tb_noAct_possition"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">Щоб перебити лідируючу ставку, введіть в поле вводу суму, більшу ніж,$ <div id="step_amount_auction_act"></div>
                </td>
            </tr>
            <tr>
                <td>Сума на вашому особовому рахунку, $</td>
                <td id="you_can_spend_on_auction_act"></td>
                <td>Зробити ставку, $</td>
                <td><input id="input_auction_bet_act" type="number"></td>
            </tr>
            <tr>
                <td colspan="4"> <button id="act_bet_lot_act">Зробити ставку</button></td>
            </tr>
        </table>
    </div>
</div>

<div id="modal_confirm_bet_act">
    <div class="content_confirm_create_lot">
        <div class="content_confirmation_myModal">
            <table>
                <div id="table_bet_text_confirm" class="table_create_lot_confirm"><span style="text-decoration: underline;">Зробити ставку</span><br>
                    Підтвердити створення ставки?</div>
                <div class="clear_div_1_confirmation_myModal" ></div>
                <div class="clear_div_2_confirmation_myModal"></div>
                <div id="press_no_lot_bet_act" class="btn_confirmation_myModal_no">НІ</div>
                <div class="clear_div_3_confirmation_myModal"></div>
                <div id="press_yes_lot_bet_act" class="btn_confirmation_myModal_yes">ТАК</div>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>

<script src="{{ URL::asset('js/countdown_active_lot.js') }}"></script>
<script src="{{ URL::asset('js/to_bet_act.js') }}"></script>
