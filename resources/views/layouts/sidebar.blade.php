<sidebar id="sidebar">
        <table class="table_course" width="100%">
        <tr>
          <th colspan="5" class="exchange_rate">Емісійна вартість токена і девіденти</th>
        </tr>
        <tr>
          <th colspan="5" class="margin_exchange_rate"></th>
        </tr>
        <tr>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
        </tr>
        <tr>
          <td>Дава</td>
          <td class="fixed_width"></td>
          <td>Курс токена,$/шт</td>
          <td class="fixed_width"></td>
          <td>Курс дивідендів, %</td>
        </tr>

        @if(count($tokens_tables))
            @foreach($tokens_tables as $tokens_table)
                    <tr>
                        <td style="width: 30%">{{\Carbon\Carbon::parse($tokens_table->date)->format('m-Y')}}</td>
                        <td class="fixed_width"></td>
                        <td>{{$tokens_table->token_price}}</td>
                        <td class="fixed_width"></td>
                        <td>{{$tokens_table->monthly_rate}}</td>
                    </tr>

            @endforeach
        @else
        @endif

        <tr>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
        </tr>
        <tr class="color_bottom_table">
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
        </tr>
        <tr class="color_bottom_table">
          <td colspan="5"><span class="see_everything">Подивитись все</span></td>
        </tr>
        <tr class="color_bottom_table">
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
        </tr>
        <tr>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
        </tr>
      </table>

    <script src="https://code.jquery.com/jquery-3.4.0.min.js"
             integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js'></script>


</sidebar>



