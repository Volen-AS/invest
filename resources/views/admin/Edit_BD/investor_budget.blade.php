@extends('admin.layouts.app')

@section('content')

    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_windon_welc">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12" style="min-height: 800px">
                    <h1 class="name_title_cabinet">Таблиця бюджету інвесторів</h1>
                    <div class="table_own_token">

                    <table>

                        <tr>
                            <td>NickName</td>
                            <td></td>
                            <td>Пошта інвестора</td>
                            <td></td>
                            <td>Сумма на рахунку</td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                        </tr>
                    @if(count($users))
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td></td>
                                <td>{{$user->email}}</td>
                                <td></td>
                                <td>{{$user->total_balance}}</td>
                            </tr>
                        @endforeach

                    @else
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

