@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_cabinet">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
       <h1 class="name_title_cabinet">Активовані лоти аукціону</h1>
      <div class="table_no_active_lot">
        @include('layouts.Auction.activeLot')
       </div>


       <div class="table_no_active_lot">
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
            <td style="width: 22%;">Дата завершення торгів</td>
            <td></td>
            <td style="width: 22%;">Пропозиція стартової ціни за лот, шт./$</td>
            <td></td>
            <td style="width: 23%;">Лідируюча позиція, $</td>
          </tr>

        @if(count($ActLOtHistores))
          @foreach($ActLOtHistores as$ActLOtHistory)
              <tr>
                <td>{{$ActLOtHistory->code_transaction_au}}</td>
                <td></td>
                <td>{{\Carbon\Carbon::parse($ActLOtHistory->created_at)->format('d-m-Y')}}</td>
                <td></td>
                <td>{{$ActLOtHistory->start_price}}</td>
                <td></td>
                <td>{{$ActLOtHistory->lider_price['bet_amount']}}</td>
              </tr>
          @endforeach
        @else
            <tr>
              <td>-- історія торгів пуста --</td>
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

