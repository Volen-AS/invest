@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="position_prim_action">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
        <h2 class="name_title_transactionHistory">Фінанси</h2>

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
          <h2 class="name_title_rewardHistory">Розподіл токенів власних та токенів рефкоманди</h2>
          <div class="tokens_refferal">
              <table>
                  <tr>
                      <th style="position: sticky">Код ID:</th>
                      <th></th>
                      <th>Псевдонім</th>
                      <th></th>
                      <th class="posion_width_tokens_refferal">Загальна сума інвестицій, $.</th>
                      <th></th>
                      <th class="posion_width_tokens_refferal">Загальна кількість токенів, шт.</th>
                      <td></td>
                      @if(count($users))
                          @if(count($users[0]->each_mounths))
                              @foreach($users[0]->each_mounths as $month)
                                  @if($month['month'] === '01')
                                          <td colspan="3">Січень {{$month['year']}}</td>
                                          <td></td>
                                  @elseif($month['month'] === '02')
                                      <td colspan="3">Лютий {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '03')
                                      <td colspan="3">Березень {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '04')
                                      <td colspan="3">Квітень {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '05')
                                      <td colspan="3">Травень {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '06')
                                      <td colspan="3">Червень {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '07')
                                      <td colspan="3">Липень {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '08')
                                      <td colspan="3">Серпень {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '09')
                                      <td colspan="3">Вересень {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '10')
                                      <td colspan="3">Жовтень {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '11')
                                      <td colspan="3">Листопад {{$month['year']}}</td>
                                      <td></td>
                                  @elseif($month['month'] === '12')
                                      <td colspan="3">Грудень {{$month['year']}}</td>
                                      <td></td>
                                  @else

                                  @endif
                              @endforeach
                          @endif
                      @endif
                  </tr>
                  <tr>
                      <td></td>
                  </tr>
                  <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>{{$total_investment}}</th>
                      <th></th>
                      <th>{{$total_token}}</th>
                      <td></td>
                      @if(count($users))
                          @if(count($users[0]->each_mounths))
                            @foreach($users[0]->each_mounths as $rate)
                                  <td colspan="3">{{$rate['rate']}}</td>
                                  <td></td>
                            @endforeach
                          @endif
                      @endif
                  </tr>

                  @if(count($users))
                      @foreach($users as $user)
                          <tr>
                              <th>{{$user->u_id}}</th>
                              <th></th>
                              <th>{{$user->name}}</th>
                              <th></th>
                              <th>{{$user->user_total_invest}}</th>
                              <th></th>
                              <th>{{$user->user_total_token}}</th>
                              <td></td>

                              @foreach($user->each_mounths as $u_month)
                                  <td><span style="text-align: left;">$</span><span style="text-align: right;">{{$u_month['sum_invest']}}</span></td>
                                  <td></td>
                                  <td>{{$u_month['sum_token']}}</td>
                                  <td></td>
                              @endforeach
                          </tr>
                      @endforeach
                  @endif
              </table>
          </div>
      </div>


      <div class="col-lg-4 col-md-12 col-sm-12">
        <div>
          @include('layouts.littleChat')
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
