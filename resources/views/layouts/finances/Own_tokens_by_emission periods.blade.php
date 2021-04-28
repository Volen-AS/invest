

<div class="table_own_token">
    <table>
        <tr>
            <td colspan="7">Таблиця власних токенів по періодах емісії</td>
        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <td colspan="3" rowspan="3">Дата:<br> Вартість токенів </td>
            <td></td>
            <td>Загальна сума інвестицій, $</td>
            <td></td>
            <td>Загальна кількість токенів, шт</td>

        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td></td>
            <td>{{$sum_invest}}</td>
            <td></td>
            <td>{{$sum_token}}</td>

        </tr>
        <tr>
            <td></td>
        </tr>
        @if(count($table_own_tokens))

            @foreach($table_own_tokens as $table_own_token)

                <tr>
                    <td>{{ \Carbon\Carbon::parse($table_own_token->date)->format('m-Y')}}</td>
                    <td></td>
                    <td>{{$table_own_token->token_rate}}</td>
                    <td></td>
                    <td>{{$table_own_token->investment}}</td>
                    <td></td>
                    <td>{{$table_own_token->own_token}}</td>

                </tr>

            @endforeach
        @else

        @endif

    </table>
</div>
