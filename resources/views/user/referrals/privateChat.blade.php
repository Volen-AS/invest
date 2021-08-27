@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_cabinet">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">

         <div class="chat_cabinet">

          <h4>Чат з (Імя)</h4>
          <ul class="shoutbox-content">

          </ul>

          <div class="shoutbox-form">
            <form method="" action="">
              <textarea id="shoutbox-comment" name="Coment" rows="3" placeholder="Ваш коментар"></textarea>
            <button class="buttom_chat_cabinet">Відправити</button>
            </form>
            <div style="clear: both;"></div>
          </div>

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

