@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="position_prim_action">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
        <h1 class="name_title_paySys">Skrill</h1>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="prim_navigation_paySys_ePay">
              <div class="navigation_paySys">
                <ul>
                  <a href="#">
                    <li><span>-></span>Реєстрація </li>
                  </a>
                  <a href="#">
                    <li><span>-></span>Вхід</li>
                  </a>
                  <a href="#">
                    <li><span>-></span>Відкрити рахунок</li>
                  </a>
                  <a href="#">
                    <li><span>-></span>Перерахувати кошти на рахунок</li>
                  </a>
                  <a href="#">
                    <li><span>-></span>Перерахувати кошти на карту</li>
                  </a>
                  <a href="#">
                    <li><span>-></span>Сформувати заявку на поповнення основного рахунку кабінету</li>
                  </a>
                  <a href="#">
                    <li><span>-></span>Сформувати заявку на виведення валюти з основного рахунку кабінету</li>
                  </a>
                </ul>
                  <div style="clear: both;"></div>

              </div>            
            </div>
          </div>


          <div class="col-lg-6 col-md-6 col-sm-12 ">
            <div class="pos_sidebar_paySys">
            @include('layouts.sidebar')
            </div>
          </div> 
        </div>

        <div class="section_question">
          <div class="primery_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Знайдіть брокера</div>
          <div class="content_block_chat">Шукайте повний список компаній-член Фондової біржі, уповн торгувати від вашого на наших ринках.</div>
          <div class="div detail_block_char"><a href="#">Детальніше...</a></div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat position_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Теплові картки</div>
          <div class="content_block_chat">Ця послуга дозволяє створювати і генерув ати теплові карти, які можна фільтрувати за індексом і сектором.</div>
          <div class="div detail_block_char"><a href="#">Детальніше...</a></div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat ">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Портфоліо</div>
          <div class="content_block_chat">Нове портфоліо оснащено новими функціями.</div>
          <div class="div detail_block_char"><a href="#">Детальніше...</a></div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Профіль компанії</div>
          <div class="content_block_chat">БЕЗКОШТОВНА слуба, розроблена таким чином, щоб дати вам докладний огляд минулих фінансових показників компан</div>
          <div class="div detail_block_char"><a href="#">Детальніше...</a></div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat position_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat position_title_block_chat">Прямий доступ до ринку</div>
          <div class="content_block_chat">Прямий доступ до риків (DMA) дозволяє при атним інвесторам розіщувати замовлення на  купівлю та продаж без посередньо на наших </div>
          <div class="div detail_block_char"><a href="#">Детальніше...</a></div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">2 Рівень</div>
          <div class="content_block_chat">Ринкові дані другого рівня надають найбільш п
          loneовний та глибокий набір даних про торгів</div>
          <div class="div detail_block_char"><a href="#">Детальніше...</a></div>
          <div style="clear: both;"></div>
        </div>
        </div>
        
      </div>

      <div class="col-lg-4 col-md-12 col-sm-12">
        <div>
          @include('layouts.chat')
        </div>

        <div>
        @include('layouts.paymentChat')
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
