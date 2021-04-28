@extends('layouts.app')

@section('content')

    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_windon_cabinet">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <h1 class="name_title_cabinet">Анкетні дані рефералів власної рефкоманди (обмежені)</h1>

                    <div class="block_affiliated_referralForm">
                        <div class="top_bgc_block_affiliated_structure">
                            <div class="img_user_affiliated_structure"></div>
                            <div class="name_user_affiliated_structure">{{ $affiliate_data->name }}</div>
                            <div style="clear: both;"></div>
                        </div>
                        <div class="primery_inform_block_referral_first">
                            <div class="number_of_tokens_referral">
                                <div class="number_of_tokens_referral_left">Кількість викуплених токенів</div>
                                <div class="number_of_tokens_referral_right">{{ $affiliate_data_statistic_data->total_token }}</div>
                                <div style="clear: both;"></div>
                            </div>
                            <div class="number_of_tokens_referral">
                                <div class="number_of_tokens_referral_left">Кількість рефералів</div>
                                <div class="number_of_tokens_referral_right">{{ $affiliate_data_referrel }}</div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="block_my_icon">
                        <div class="My_block_for_referral" >
                            <div class="My_block_top_bgc_block_referral_first" >
                                <div class="My_block_img_user_referral"></div>
                                <div class="My_block_name_user_referral">{{ Auth::user()->name }}</div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>




                    <div class="your_structure_referral">

                        @include('layouts.referrel.referralForm')

                        <div style="clear: both;"></div>

                        <div class="table_affiliated_referralForm">
                            <h5>Анкетні дані афіліата</h5>
                            <table class="">
                                <tr>
                                    <td style="height: 7px;"></td>
                                    <td style="width: 2%;"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Реєстраційний номер</td>
                                    <td></td>
                                    <td>{{ $affiliate_data->u_id }}</td>
                                </tr>
                                <tr>
                                    <td>Нік</td>
                                    <td></td>
                                    <td>{{ $affiliate_data->name }}</td>
                                </tr>
                                <tr>
                                    <td>ФІО</td>
                                    <td></td>
                                    <td>{{ $affiliate_data_profile->first_name}} {{ $affiliate_data_profile->last_name}} {{ $affiliate_data_profile->second_name }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td></td>
                                    <td>{{ $affiliate_data->email }}</td>
                                </tr>
                                <tr>
                                    <td>Телефон</td>
                                    <td></td>
                                    <td>{{ $affiliate_data_profile->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td>Skype</td>
                                    <td></td>
                                    <td>{{ $affiliate_data_profile->skype }}</td>
                                </tr>
                            </table>
                        </div>



                        <div style="clear: both;"></div>
                        <div id="hint"></div>
                    </div>


                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 ">
                    <div class="click_chat">Ч<br>А<br>Т</div>
                    <div id="">
                        @include('layouts.chat')
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

