@extends('admin.layouts.app')

@section('content')

    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_windon_welc">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12" style="min-height: 800px">
                    <h1 class="name_title_cabinet">Неактивовані лоти</h1>
                    <div class="table_no_active_lot">

                        <table id="table_for_No_actiov_lot">
                            <tr>
                                <td >Код транзакції</td>
                                <td></td>
                                <td>Емісійний період</td>
                                <td></td>
                                <td>Кількість токенів</td>
                                <td></td>
                                <td>Старт лота, таймер</td>
                                <td></td>
                                <td>Пропозиція стартової ціни за лот/$</td>
                                <td></td>
                                <td>Перша ставка лоту/$</td>
                            </tr>

                            @if(count($not_active_lots))

                                @foreach($not_active_lots as $not_actiov_lot)
                                    <tr class="tr_for_No_actiov_lot" data-final_date_no_active_lot="{{$not_actiov_lot->final_date}}" data-token_em_price="{{$not_actiov_lot->token_em_price}}"
                                        data-first_buyer="{{$not_actiov_lot->first_buyer}}" data-step_amount="{{$not_actiov_lot->min_bet}}">
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
                                        <td>{{$not_actiov_lot->first_price_lot}}</td>
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


<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>

<script src="{{ URL::asset('js/countdown_no_action_lot.js') }}"></script>
