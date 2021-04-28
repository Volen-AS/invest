@extends('layouts.app')

@section('content')

  <div id="primery_window">
    
  <div class="for_position_top_line">
    <div style="clear:both;"></div>
  </div>
  <div class="primery_windon_welc">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12">
        <h1 class="title_chat">Питання та відповіді</h1>
        <p class="content_chat">Контролюйте існуючі інвестиції, оцінюйте ефективність отримуйте повідомея про ринкові новини та зміницін, як вони відбуваються, та багато іншого.</p>

        <div class="primery_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Знайдіть брокера</div>
          <div class="content_block_chat">Шукайте повний список компаній-член Фондової біржі, уповн торгувати від вашого на наших ринках.</div>
          <div class="div detail_block_char">Детальніше...</div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat position_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Теплові картки</div>
          <div class="content_block_chat">Ця послуга дозволяє створювати і генерув ати теплові карти, які можна фільтрувати за індексом і сектором.</div>
          <div class="div detail_block_char">Детальніше...</div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat ">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Портфоліо</div>
          <div class="content_block_chat">Нове портфоліо оснащено новими функціями.</div>
          <div class="div detail_block_char">Детальніше...</div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Профіль компанії</div>
          <div class="content_block_chat">БЕЗКОШТОВНА слуба, розроблена таким чином, щоб дати вам докладний огляд минулих фінансових показників компан</div>
          <div class="div detail_block_char">Детальніше...</div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat position_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat position_title_block_chat">Прямий доступ до ринку</div>
          <div class="content_block_chat">Прямий доступ до риків (DMA) дозволяє при атним інвесторам розіщувати замовлення на  купівлю та продаж без посередньо на наших </div>
          <div class="div detail_block_char">Детальніше...</div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">2 Рівень</div>
          <div class="content_block_chat">Ринкові дані другого рівня надають найбільш п
          loneовний та глибокий набір даних про торгів</div>
          <div class="div detail_block_char">Детальніше...</div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Фондовий скрин</div>
          <div class="content_block_chat">Скористайтеся нашим безкоштовним інструментом для створення списків цінних паперів на основі широкого кола критеріїв.</div>
          <div class="div detail_block_char">Детальніше...</div>
          <div style="clear: both;"></div>
        </div>

        <div class="primery_blocks_chat position_blocks_chat">
          <div class="top_bgc_block_chat"></div>
          <div class="title_block_chat">Сповіщення</div>
          <div class="content_block_chat">Отримуйте миттєві сповіщення щодо цільових показників та змін, новин ринку або змін портфеля.</div>
          <div class="div detail_block_char">Детальніше...</div>
          <div style="clear: both;"></div>
        </div>
        
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 ">
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
