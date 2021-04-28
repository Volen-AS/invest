@extends('admin.layouts.app')

@section('content')

    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_windon_welc">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12" style="min-height: 800px">
                    <h1 class="name_title_cabinet">Таблиця токенів по періодах емісії</h1>
                    <div class="table_own_token">
                        <table>
                            <tr>
                                <td colspan="3" rowspan="3">Дата: <br>Вартість токенів</td>
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
                            </tr>
                            <tr>
                                <td></td>
                                <td>{{$totalInvest}}</td>
                                <td></td>
                                <td>{{$totalToken}}</td>
                            </tr>
            @if(count($each_mounths))

                @foreach($each_mounths as $each_mounth)
                            <tr>
                                <td>{{$each_mounth['date']}}</td>
                                <td></td>
                                <td>{{$each_mounth['rate']}}</td>
                                <td></td>
                                <td>{{$each_mounth['sum_invest']}}</td>
                                <td></td>
                                <td>{{$each_mounth['sum_token']}}</td>
                            </tr>

                @endforeach
                        </table>
            @else

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

