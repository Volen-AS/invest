@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="position_prim_action">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
        <h2 class="name_title_replenishment">Сформувати заявку на поповнення основного рахунку</h2>

        
            <div class="card pos_card">

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="RegisNumber" class="col-md-4 col-form-label text-md-right">Реєстраційний номер</label>

                            <div class="col-md-6">
                                <div id="RegisNumber" type="text" class="pos_input_replenishment" name="name_id">{{Auth::id()}}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">Нікнейм</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="pos_input_replenishment" name="name" value="" required >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="paySystems" class="col-md-4 col-form-label text-md-right">Платіжна система</label>

                            <div class="col-md-6">
                                <select name="paySystems" id="paySystems">
                                  <option value="">Payeer</option>
                                  <option value="">PayPal</option>
                                  <option value="">Skrill</option>
                                  <option value="">24paybank</option>
                                  <option value="">Kuna</option>
                                  <option value="">bestchange</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="purse" class="col-md-4 col-form-label text-md-right">№ гаманця</label>

                            <div class="col-md-6">
                                <input id="purse" type="text" class="pos_input_replenishment" name="name" value="" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="currency" class="col-md-4 col-form-label text-md-right">Валюта</label>

                            <div class="col-md-6">
                                <select name="currency" id="currency">
                                  <option value="">USD</option>
                                  <option value="">UAN</option>
                                  <option value="">LYD</option>
                                  <option value="">RUB</option>
                                  <option value="">CNY</option>
                                  <option value="">INR</option>
                                  <option value="">GBP</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sum" class="col-md-4 col-form-label text-md-right">Сума</label>

                            <div class="col-md-6">
                                <input id="sum" type="number" class="pos_input_replenishment" name="Sum" value="" required >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Відправити заявку
                                </button>
                            </div>
                        </div>
                    </form>
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
