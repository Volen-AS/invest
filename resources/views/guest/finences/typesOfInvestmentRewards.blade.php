@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_welc">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 ">
        <div class="primery_information">
          <h1 class="Who_are_we">Види інвестиційної винагороди</h1>
          <div class="img_banner_welcome">
            </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 ">
        @include('layouts.sidebar')
      </div>

      <div class="primery_information_welc">
        <div class="row">
          <div class="col-lg-5 col-md-7 col-sm-7">
            <div>
              <table class="header_table_welc">
                <tr>
                  <td style="width: 40%;">НОВІ ПИТАННЯ</td>
                  <td style="width: 60%;">ОСНОВНІ ПИТАННЯ</td>
                </tr>
              </table>
              <table class="table_welc">
                <tr>
                  <th colspan="5" class=""></th>
                </tr>
                <tr>
                  <th colspan="5" class="margin_exchange_welc"></th>
                </tr>
                <tr>
                  <td class="fixed_height"></td>
                  <td class="fixed_width"></td>
                  <td class="fixed_height"></td>
                  <td class="fixed_width"></td>
                  <td class="fixed_height"></td>
                </tr>
                <tr>
                  <td>Назва компанії</td>
                  <td class="fixed_width"></td>
                  <td>Перший день торгів</td>
                  <td class="fixed_width"></td>
                  <td>Очікувані гроші зібрані</td>
                </tr>
                <tr>
                  <td style="border-style:hidden">SDX Energy</td>
                  <td class="fixed_width"></td>
                  <td>28/05/2019</td>
                  <td class="fixed_width"></td>
                  <td style="border-style:hidden">nil</td>
                </tr>        
                <tr>
                  <td>Distribution Finance Capital Holdings plc</td>
                  <td class="fixed_width"></td>
                  <td>28/05/2019</td>
                  <td class="fixed_width"></td>
                  <td class="">Немає капіталу, який можна було залучити на</td>
                </tr>
                <tr>
                  <td style="border-style:hidden">Loungers plc</td>
                  <td class="fixed_width"></td>
                  <td>28/05/2019</td>
                  <td class="fixed_width"></td>
                  <td style="border-style:hidden">£61.6 million</td>
                </tr>  
                <tr>
                  <th colspan="5" class="margin_exchange_welc"></th>
                </tr>
              </table>
            </div>


            <div class="second_table_welc">
              <table class="header_table_welc">
                <tr>
                  <td style="width: 25%;">RISERS</td>
                  <td style="width: 75%;">VOLUME LEADERS</td>
                </tr>
              </table>
              <table class="table_welc">
                <tr>
                  <th colspan="5" class=""></th>
                </tr>
                <tr>
                  <th colspan="5" class="margin_exchange_welc"></th>
                </tr>
                <tr>
                  <td class="fixed_height"></td>
                  <td class="fixed_width"></td>
                  <td class="fixed_height"></td>
                  <td class="fixed_width"></td>
                  <td class="fixed_height"></td>
                </tr>
                <tr>
                  <td>Назва</td>
                  <td class="fixed_width"></td>
                  <td>Ціна</td>
                  <td class="fixed_width"></td>
                  <td>+/-</td>
                </tr>
                <tr>
                  <td class="color_second_table" style="border-style:hidden">INSPIRIT ENERGY</td>
                  <td class="fixed_width"></td>
                  <td class="color_second_table">0.05</td>
                  <td class="fixed_width"></td>
                  <td class="course_up" style="border-style:hidden">+58.33 ^ </td>
                </tr>        
                <tr>
                  <td class="color_second_table">DIGITALBOX</td>
                  <td class="fixed_width"></td>
                  <td class="color_second_table">8.25</td>
                  <td class="fixed_width"></td>
                  <td class="course_up">+58.33 ^ </td>
                </tr>
                <tr>
                  <td class="color_second_table" style="border-style:hidden">FUSION ANTIBODY</td>
                  <td class="fixed_width"></td>
                  <td class="color_second_table">72.00</td>
                  <td class="fixed_width"></td>
                  <td class="course_up" style="border-style:hidden">+58.33 ^ </td>
                </tr>         
                <tr>
                  <td class="color_second_table">EU SUPPLY</td>
                  <td class="fixed_width"></td>
                  <td class="color_second_table">12.25</td>
                  <td class="fixed_width"></td>
                  <td class="course_up">+58.33 ^ </td>
                </tr>
                <tr>
                  <td class="color_second_table" style="border-style:hidden">RENEURON</td>
                  <td class="fixed_width"></td>
                  <td class="color_second_table">310</td>
                  <td class="fixed_width"></td>
                  <td class="course_up" style="border-style:hidden">+58.33 ^ </td>
                </tr> 
                <tr>
                  <th class="infor_table_welc" colspan="5" class="margin_exchange_welc">Всі дані затримуються принаймні на 15 хвилин</th>
                </tr>
                

                <tr>
                  <th style="background-color: #DDE2E6;" colspan="5" class="margin_exchange_welc"></th>
                </tr>
                <tr class="color_bottom_table">
                  <td colspan="4"><span class="see_everything_welc">Подивитись все</span></td>
                  <td align="center"> <a class="go_to_site" href="">------></a></td>
                </tr>                
                <tr>
                  <th style="background-color: #DDE2E6;" colspan="5" class="margin_exchange_welc"></th>
                </tr>
              </table>
            </div>

            <div class="market_news">
              <div class="top_market_news"></div>
              <div class="name_market_news">Новини ринку</div>
              <div class="info_market_news"><a href="">Що таке RNS News?</a></div>
              <div class="search_market_news">Пошук
                <input type="search">
              </div>

              <form class="search_market_news">Сектор
                <select name="" id="">
                  <option value="">Виберіть</option>
                  <option value=""></option>
                  <option value=""></option>
                </select>
                <div class="go_market_news">GO</div>
              </form>

              <div class="market_news1">17:56   View Synairgen plc</div>
              <div class="market_news2">17:53   View Miton Group Plc </div>
              <div class="market_news3">17:50   View Watchstone Group PLC </div>
              <div class="see_all_market">Подивитись все</div>
              <div class="see_all_market2">------></div>

            </div>
          </div>
          <div class="col-lg-4 col-md-5 col-sm-5">
            <h4 class="welcome2">Ласкаво просимо</h4>
            <p class="welcome2_p">AIM - найбільш успішний ринок зростання в світі. Починаючи з 1995 року, більше 3600 компаній з усього світу вирішили приєднатися до AIM. Увімкнувши компанії завтрашнього дня,  AIM продовжує допомагати дрібним і зростаючим компаніям збільшувати необхідний для розширення</p>
            <div class="block_inform">
              <div></div>
              <div>ДЛЯ КОМПАНІЙ</div>
              <p>П,енчурний капітал, а також більш ство компанії приєднуються до AIM, шукаючи доступу до капіталу зростання.фцвфвчс оаовррвооа рраоврроа вооівіор аооіва</p>
              <a href="#">Дізнатися більше.</a>
            </div>

            <div class="block_inform">
              <div></div>
              <div>ДЛЯ КОНСУЛЬТАЦІВ</div>
              <p>AIM підтримується широкою спільнотою досвідчених радників, починаючи в брокерів до бухгалтерів, юристів і зв'язків з громадськістю та фірм по зв'язках з інвесторами</p>
              <a href="#">Дізнатися більше.</a>
            </div>

            <div class="block_inform block_inform_position">
              <div></div>
              <div>ПУБЛІКАЦІЇ</div>
              <p>Останні публікації AIM та вибір інформації, виробленої третіми сторонами з різних аспектів AIM, можна знайти тут.Посібник для підприємців</p>
              <a href="#">Дізнатися більше.</a>
            </div>
          </div>
          <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="canect_as">
              <h3>ЗВ'ЯЖІТЬСЯ З НАМИ</h3>
              <p>Якщо у Вас є запитання або коментарі, зверніться до команди <br> <a href="#">AIM.</a></p>
            </div>

            <div class="block_inform">
              <div></div>
              <div>РЕГУЛЯТОРНИЙ ЛАНДШАФТ</div>
              <p>Положення AIM базуєтьсяррррп на більш широки хіваіва іапппаапр ропи, а такааіаааа іаівврпр аправаів адоаранттврлі лірьлтві</p>
              <a href="#">Дізнатися більше.</a>
            </div>

            <div class="statistic">
              <h5>СТАТИСТИКА</h5>
              <div class="all_p_statistic">
                <p>2- Apr -2019 - AIM Statistics - March 2019</p> <br>
                <p>4- Mar -2019 - AIM Statistics - February 2019</p> <br>
                <p>6- Feb -2019 - AIM Statistics - January 2019</p> <br>
                <a href="#">Усі статистичні дані</a>
              </div>

              <div class="block_inform pos_block_inform">
              <div></div>
                <h5>ШВИДКІ ПОСИЛАННЯ</h5>
                <div class="all_a_statistic">
                  <a href="#">AIM Rules</a><br>
                  <a href="#">AIM Notices</a><br>
                  <a href="#">Fees Calculator</a><br>
                  <a href="#">AIM Company search</a><br>
                  <a href="#">Nomad search</a>
                </div>
                
              </div>
              
            </div>
          </div>
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