@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_cabinet">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
               <h1 class="name_title_cabinet">Історія торгів на аукціоні за участю рефералів своєї команди</h1>

              <div class="table_no_active_lot_history">
                <table>
                  <tr>
                    <td colspan="13">Історія закритих лотів</td>
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

                  @if(count($historiesNotActLotTeams))
                    @foreach($historiesNotActLotTeams as $historiesNotActLotTeam)
                      @if(in_array($historiesNotActLotTeam->seller_u_id,$team) )
                        <tr>
                          <td>{{$historiesNotActLotTeam->code_transaction_au}}</td>
                          <td></td>
                          <td>{{$historiesNotActLotTeam->created_at}}</td>
                          <td></td>
                          <td>{{$historiesNotActLotTeam->start_price}}</td>
                          <td></td>
                          <td>{{$historiesNotActLotTeam->first_price_lot['bet_amount']}}</td>
                          <td></td>
                          <td>Продаж лота</td>
                        </tr>
                      @elseif(in_array($historiesNotActLotTeam->first_buyer,$team) )
                        <tr>
                          <td>{{$historiesNotActLotTeam->code_transaction_au}}</td>
                          <td></td>
                          <td>{{$historiesNotActLotTeam->created_at}}</td>
                          <td></td>
                          <td>{{$historiesNotActLotTeam->start_price}}</td>
                          <td></td>
                          <td>{{$historiesNotActLotTeam->first_price_lot['bet_amount']}}</td>
                          <td></td>
                          <td>Зроблена ставка</td>
                        </tr>
                      @endif
                    @endforeach

                @else
                    <tr>
                      <td colspan="13"> -- Ваша рефкоманда ще не брала участі в торгах --</td>
                    </tr>
                @endif
                </table>
                </div>
        
                <div class="table_no_active_lot_history">
                <table>
                  <tr>
                    <td colspan="13">Історія завершених торгів</td>
                  </tr>
                  <tr>
                    <td colspan="13"></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">Код транзакції</td>
                    <td></td>
                    <td style="width: 22%;">Дата завершення торгів</td>
                    <td></td>
                    <td style="width: 22%;">Пропозиція стартової ціни за лот, шт./$</td>
                    <td></td>
                    <td style="width: 23%;">Попередня позиція, $</td>
                    <td></td>
                    <td style="width: 23%;">Лідируюча позиція, $</td>
                    <td></td>
                    <td>Статус</td>
                  </tr>
                  @if(count($historiesActLotsTeams))
                    @foreach($historiesActLotsTeams as $historiesActLotsTeam)
                      @if(in_array($historiesActLotsTeam->seller_u_id,$team) )
                        <tr>
                          <td>{{$historiesActLotsTeam->code_transaction_au}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->created_at}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->start_price}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->previous_price['bet_amount']}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->lider_price['bet_amount']}}</td>
                          <td></td>
                          <td>Продаж лота</td>
                        </tr>
                      @elseif(in_array($historiesActLotsTeam->previous_price_user,$team) )
                        <tr>
                          <td>{{$historiesActLotsTeam->code_transaction_au}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->created_at}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->start_price}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->previous_price['bet_amount']}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->lider_price['bet_amount']}}</td>
                          <td></td>
                          <td>Попередня позиція</td>
                        </tr>
                      @elseif(in_array($historiesActLotsTeam->lider_price_user,$team))
                        <tr>
                          <td>{{$historiesActLotsTeam->code_transaction_au}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->created_at}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->start_price}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->previous_price['bet_amount']}}</td>
                          <td></td>
                          <td>{{$historiesActLotsTeam->lider_price['bet_amount']}}</td>
                          <td></td>
                          <td>Зроблена ставка</td>
                        </tr>

                      @endif
                    @endforeach

                  @else
                    <tr>
                      <td colspan="13"> -- Ваша рефкоманда ще не брала участі в торгах --</td>
                    </tr>

                  @endif
                </table>
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

