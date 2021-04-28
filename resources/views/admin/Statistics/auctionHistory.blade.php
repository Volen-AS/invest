@extends('admin.layouts.app')

@section('content')

    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_windon_welc">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12" style="min-height: 800px">

                    <h1 class="name_title_cabinet">Історія торгів на аукціоні</h1>

                    <div class="table_no_active_lot_history">
                        <table>
                            <tr>
                                <td colspan="11">Неактивовані лоти</td>
                            </tr>
                            <tr>
                                <td colspan="11"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;">Код транзакції</td>
                                <td></td>
                                <td style="width: 22%;">Дата зняття лота з торгів</td>
                                <td></td>
                                <td style="width: 22%;">Пропозиція стартової ціни за лот, шт./$</td>
                                <td></td>
                                <td style="width: 23%;">Лідируюча позиція, $</td>
                            </tr>

                            @if(count($historiesPassLots))
                                @foreach($historiesPassLots as $historiesPassLot)
                                        <tr>
                                            <td>{{$historiesPassLot->code_transaction_au}}</td>
                                            <td></td>
                                            <td>{{$historiesPassLot->created_at}}</td>
                                            <td></td>
                                            <td>{{$historiesPassLot->start_price}}</td>
                                            <td></td>
                                            <td>{{$historiesPassLot->first_price_lot['bet_amount']}}</td>
                                        </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td colspan="12">--історія пуста--</td>
                                </tr>
                            @endif
                        </table>
                    </div>

                    <div class="table_finish_lot">
                        <table>
                            <tr>
                                <td colspan="12">Історія завершених торгів</td>
                            </tr>
                            <tr>
                                <td colspan="12"></td>
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
                            </tr>

                            @if(count($historiesActLots))
                                @foreach($historiesActLots as $historiesActLot)
                                <tr>
                                    <td>{{$historiesActLot->code_transaction_au}}</td>
                                    <td></td>
                                    <td>{{$historiesActLot->created_at}}</td>
                                    <td></td>
                                    <td>{{$historiesActLot->start_price}}</td>
                                    <td></td>
                                    <td>{{$historiesActLot->previous_price['bet_amount']}}</td>
                                    <td></td>
                                    <td>{{$historiesActLot->lider_price['bet_amount']}}</td>
                                </tr>
                                @endforeach

                        @else
                                <tr>
                                    <td colspan="12">--історія пуста--</td>
                                </tr>
                        @endif
                        </table>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 ">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </div>


    <div id="footer">
        @include('admin.layouts.footer')
    </div>
@endsection

