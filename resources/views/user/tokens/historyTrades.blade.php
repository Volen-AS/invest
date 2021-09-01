@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_cabinet">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
       <h1 class="name_title_cabinet">Історія власних торгів (купівля, продаж) на аукціоні</h1>

       <div class="table_no_active_lot_history">
        <table>
          <tr>
            <td colspan="13">Неактивовані лоти</td>
          </tr>
          <tr>
            <td colspan="13"></td>
          </tr>
          <tr>
            <td style="width: 30%;">Код транзакції</td>
            <td></td>
            <td style="width: 22%;">Дата зняття лота з торгів</td>
            <td></td>
            <td style="width: 22%;">Пропозиція стартової ціни за лот, шт./$</td>
            <td></td>
            <td style="width: 23%;">Лідируюча позиція, $</td>
            <td></td>
            <td>Статус</td>
          </tr>

          @if($sellerNotActiveLots || $firstBuyerNotActiveLots)
              @foreach($sellerNotActiveLots as $sellerNotActiveLot)
                    <tr>
                        <td>{{$sellerNotActiveLot->code_transaction_au}}</td>
                        <td></td>
                        <td>{{$sellerNotActiveLot->created_at}}</td>
                        <td></td>
                        <td>{{$sellerNotActiveLot->start_price}}</td>
                        <td></td>
                        <td>{{$sellerNotActiveLot->first_price_lot['bet_amount']}}</td>
                        <td></td>
                        <td>Продаж лота</td>
                    </tr>
              @endforeach
              @foreach($firstBuyerNotActiveLots as $firstBuyerNotActiveLot)
                  <tr>
                      <td>{{$firstBuyerNotActiveLot->code_transaction_au}}</td>
                      <td></td>
                      <td>{{$firstBuyerNotActiveLot->created_at}}</td>
                      <td></td>
                      <td>{{$firstBuyerNotActiveLot->start_price}}</td>
                      <td></td>
                      <td>{{$firstBuyerNotActiveLot->first_price_lot['bet_amount']}}</td>
                      <td></td>
                      <td>Продаж лота</td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="13">--історія пуста--</td>
                </tr>
            @endif
        </table>
       </div>


{{--            @foreach($historiesNotActLots as $historiesNotActLot)--}}
{{--              @if($historiesNotActLot->seller_u_id == Auth::id())--}}
{{--                <tr>--}}
{{--                  <td>{{$historiesNotActLot->code_transaction_au}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesNotActLot->created_at}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesNotActLot->start_price}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesNotActLot->first_price_lot['bet_amount']}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>Продаж лота</td>--}}
{{--                </tr>--}}
{{--              @elseif($historiesNotActLot->first_buyer == Auth::id())--}}
{{--                <tr>--}}
{{--                  <td>{{$historiesNotActLot->code_transaction_au}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesNotActLot->created_at}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesNotActLot->start_price}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesNotActLot->first_price_lot['bet_amount']}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>Зроблена ставка</td>--}}
{{--                </tr>--}}
{{--              @endif--}}
{{--            @endforeach--}}

{{--         @else--}}
{{--            <tr>--}}
{{--              <td colspan="13">--історія пуста--</td>--}}
{{--            </tr>--}}
{{--         @endif--}}
{{--         </table>--}}
{{--        </div>--}}

        <div class="table_finish_lot">
        <table>
          <tr>
            <td colspan="13">Історія завершених торгів</td>
          </tr>
          <tr>
            <td colspan="13"></td>
          </tr>
          <tr>
            <td style="width: 20%;">Код транзакції</td>
            <td></td>
            <td style="width: 22%;">Дата завершення торгів</td>
            <td></td>
            <td style="width: 19%;">Пропозиція стартової ціни за лот, шт./$</td>
            <td></td>
            <td style="width: 19%;">Попередня позиція, $</td>
            <td></td>
            <td style="width: 23%;">Лідируюча позиція, $</td>
            <td></td>
            <td>Статус</td>
          </tr>

          @if($sellerActiveLots || $previousPriceActiveLots || $leaderPriceActiveLots)
                @foreach($sellerActiveLots as $sellerActiveLot)
                    <tr>
                        <td>{{$sellerActiveLot->code_transaction_au}}</td>
                        <td></td>
                        <td>{{$sellerActiveLot->created_at}}</td>
                        <td></td>
                        <td>{{$sellerActiveLot->start_price}}</td>
                        <td></td>
                        <td>{{$sellerActiveLot->previous_price['bet_amount']}}</td>
                        <td></td>
                        <td>{{$sellerActiveLot->lider_price['bet_amount']}}</td>
                        <td></td>
                        <td>Продаж лота</td>
                    </tr>
                @endforeach
                @foreach($previousPriceActiveLots as $previousPriceActiveLot)
                    <tr>
                        <td>{{$previousPriceActiveLot->code_transaction_au}}</td>
                        <td></td>
                        <td>{{$previousPriceActiveLot->created_at}}</td>
                        <td></td>
                        <td>{{$previousPriceActiveLot->start_price}}</td>
                        <td></td>
                        <td>{{$previousPriceActiveLot->previous_price['bet_amount']}}</td>
                        <td></td>
                        <td>{{$previousPriceActiveLot->lider_price['bet_amount']}}</td>
                        <td></td>
                        <td>Продаж лота</td>
                    </tr>
                @endforeach
                @foreach($leaderPriceActiveLots as $leaderPriceActiveLot)
                    <tr>
                        <td>{{$leaderPriceActiveLot->code_transaction_au}}</td>
                        <td></td>
                        <td>{{$leaderPriceActiveLot->created_at}}</td>
                        <td></td>
                        <td>{{$leaderPriceActiveLot->start_price}}</td>
                        <td></td>
                        <td>{{$leaderPriceActiveLot->previous_price['bet_amount']}}</td>
                        <td></td>
                        <td>{{$leaderPriceActiveLot->lider_price['bet_amount']}}</td>
                        <td></td>
                        <td>Продаж лота</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="13">--історія пуста--</td>
                </tr>
            @endif
        </table>
        </div>





{{--            @foreach($historiesActLots as $historiesActLot)--}}
{{--              @if($historiesActLot->seller_u_id == Auth::id())--}}
{{--                <tr>--}}
{{--                  <td>{{$historiesActLot->code_transaction_au}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->created_at}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->start_price}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->previous_price['bet_amount']}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->lider_price['bet_amount']}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>Продаж лота</td>--}}
{{--                </tr>--}}
{{--              @elseif($historiesActLot->previous_price_user == Auth::id())--}}
{{--                <tr>--}}
{{--                  <td>{{$historiesActLot->code_transaction_au}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->created_at}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->start_price}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->previous_price['bet_amount']}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->lider_price['bet_amount']}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>Попередня позиція</td>--}}
{{--                </tr>--}}
{{--              @elseif($historiesActLot->lider_price_user == Auth::id())--}}
{{--                <tr>--}}
{{--                  <td>{{$historiesActLot->code_transaction_au}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->created_at}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->start_price}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->previous_price['bet_amount']}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>{{$historiesActLot->lider_price['bet_amount']}}</td>--}}
{{--                  <td></td>--}}
{{--                  <td>Лідируюча позиція</td>--}}
{{--                </tr>--}}

{{--              @endif--}}
{{--            @endforeach--}}

{{--          @else--}}
{{--            <tr>--}}
{{--              <td colspan="13">--історія пуста--</td>--}}
{{--            </tr>--}}
{{--          @endif--}}
{{--        </table>--}}
{{--        </div>--}}
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

