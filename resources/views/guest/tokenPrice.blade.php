@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_information_tokenprice">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
        <div class="primery_information">
          <h1 class="name_title_tokenprice">Вартість токена</h1>

      <table class="table_tokenprice" width="100%">
        <tr>
          <th colspan="5" class="margin_exchange_rate">Тарифи</th>
        </tr>
        <tr>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
        </tr>
        <tr>
          <td></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
          <td class="fixed_width"></td>
          <td class="fixed_height"></td>
        </tr>
        <tr>
          <td>Імя</td>
          <td class="fixed_width"></td>
          <td>Остання ціна</td>
          <td class="fixed_width"></td>
          <td class="">+/-</td>
          <td class="fixed_width"></td>
          <td> %+/-</td>
          <td class="fixed_width"></td>
          <td></td>
        </tr>        
        <tr>
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_down">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_down"> %+/-</td>
          <td class="fixed_width"></td>
          <td style="width: 30px;">^</td>        
        </tr>

        <tr>
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_down">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_down"> %+/-</td>
          <td class="fixed_width"></td>
          <td style="width: 30px;">^</td>        
        </tr>

        <tr>
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_up">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_up"> %+/-</td>
          <td class="fixed_width"></td>
          <td>^</td>
        </tr>  

        <tr>
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_down">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_down"> %+/-</td>
          <td class="fixed_width"></td>
          <td>^</td>
        </tr>

        
        <tr>
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_down">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_down"> %+/-</td>
          <td class="fixed_width"></td>
          <td style="width: 30px;">^</td>        
        </tr>

        <tr class=" ">
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_up">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_up"> %+/-</td>
          <td class="fixed_width"></td>
          <td>^</td>
        </tr>

        <tr>
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_up">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_up"> %+/-</td>
          <td class="fixed_width"></td>
          <td>^</td>
        </tr>  

        <tr>
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_down">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_down"> %+/-</td>
          <td class="fixed_width"></td>
          <td>^</td>
        </tr>

        
        <tr class=" ">
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_up">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_up"> %+/-</td>
          <td class="fixed_width"></td>
          <td>^</td>
        </tr>

        <tr>
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_down">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_down"> %+/-</td>
          <td class="fixed_width"></td>
          <td style="width: 30px;">^</td>        
        </tr>

        <tr class=" ">
          <td>UAN</td>
          <td class="fixed_width"></td>
          <td>1.232</td>
          <td class="fixed_width"></td>
          <td class="course_up">+7,45▲</td>
          <td class="fixed_width"></td>
          <td class="course_up"> %+/-</td>
          <td class="fixed_width"></td>
          <td>^</td>
        </tr>
      </table>
      <p class="content_tokenPrice">Всі дані затримуються принаймні на 15 хвилин.</p>
        </div>
      </div>

        <div class="col-lg-4 col-md-12 col-sm-10">
           @include('layouts.sidebar')
        </div>
        
    </div>    
  </div>
  <div class="for_position_bottom_line"></div>
  </div>

  <div id="footer">
  @include('layouts.footer')
  </div>
@endsection