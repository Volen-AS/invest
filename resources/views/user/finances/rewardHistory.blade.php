@extends('layouts.app')

@section('content')

    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="position_prim_action">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <h2 class="name_title_rewardHistory">Історія нарахування прибутків щомісячної інвестиційної винагороди (дивідендів) та прибутків від аукціонних торгів рефкоманди</h2>

                    <div class="transaction_rewardHistory">
                        <table class="">
                            <tr>
                                <td colspan="9"></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 11%;">Дата</td>
                                <td></td>
                                <td style="width: 30%;">Тип транзакції (купівля чи продаж по рефструктурі, дивіденди)</td>
                                <td></td>
                                <td style="width: 39%;">№ транзакції </td>
                                <td></td>
                                <td style="width: 10%;">Нікнейм реферала</td>
                                <td></td>
                                <td style="width: 10%;">Сума, USD</td>
                            </tr>
                            @if(count($interest_from_refs))
                                @foreach($interest_from_refs as $interest_from_ref)
                                    @if($interest_from_ref->getTable() == 'purchased_tokens_from_refs')
                                    <tr>
                                        <td>{{$interest_from_ref->created_at->format('d-m-Y')}}</td>
                                        <td></td>
                                        <td>купівля токенів</td>
                                        <td></td>
                                        <td>{{$interest_from_ref->transaction}}</td>
                                        <td></td>
                                        <td>{{$interest_from_ref->name}}</td>
                                        <td></td>
                                        <td>{{$interest_from_ref->in_cash}}</td>
                                    </tr>
                                    @elseif($interest_from_ref->getTable() == 'act_lot_histories')
                                        @if(in_array($interest_from_ref->seller_u_id,$team))
                                            <tr>
                                                <td>{{$interest_from_ref->created_at->format('d-m-Y')}}</td>
                                                <td></td>
                                                <td>продажа лота</td>
                                                <td></td>
                                                <td>{{$interest_from_ref->code_transaction_au}}</td>
                                                <td></td>
                                                <td>{{$interest_from_ref->seller_name}}</td>
                                                <td></td>
                                                <td>{{number_format($interest_from_ref->lider_price['bet_amount']*0.05,2) }}</td>
                                            </tr>
                                        @elseif(in_array($interest_from_ref->previous_price_user,$team))
                                            <tr>
                                                <td>{{$interest_from_ref->created_at->format('d-m-Y')}}</td>
                                                <td></td>
                                                <td>попередня ставка на аукціоні</td>
                                                <td></td>
                                                <td>{{$interest_from_ref->code_transaction_au}}</td>
                                                <td></td>
                                                <td>{{$interest_from_ref->previous_name}}</td>
                                                <td></td>
                                                <td>{{ $interest_from_ref->previous_price['aff_reward']}}</td>
                                            </tr>
                                        @elseif(in_array($interest_from_ref->lider_price_user,$team))
                                            <tr>
                                                <td>{{$interest_from_ref->created_at->format('d-m-Y')}}</td>
                                                <td></td>
                                                <td>лідируюча ставка на аукціоні</td>
                                                <td></td>
                                                <td>{{$interest_from_ref->code_transaction_au}}</td>
                                                <td></td>
                                                <td>{{$interest_from_ref->lider_name}}</td>
                                                <td></td>
                                                <td>{{ $interest_from_ref->lider_price['aff_reward']}}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">історія пуста</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
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
