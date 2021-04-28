@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_cabinet">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
		<h1 class="name_title_cabinet">Рефпосилання. Банери (бібліотека)</h1>

		<div class="slider-container">
		  <div class="slider">
		    <div class="slider__item">
		      <img src="http://i67.tinypic.com/ehx5wy.jpg" alt="">
		      <div class="slider__caption"></div>
		    </div>
		    <div class="slider__item">
		      <img src="http://i65.tinypic.com/1znbp7q.jpg" alt="">
		      <div class="slider__caption"></div>
		    </div>
		    <div class="slider__item">
		      <img src="http://i68.tinypic.com/nov5zt.jpg" alt="">
		      <div class="slider__caption"></div>
		    </div>
		  </div>
		  <div class="slider__switch slider__switch--prev" data-ikslider-dir="prev">
		    <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.89 17.418c.27.272.27.71 0 .98s-.7.27-.968 0l-7.83-7.91c-.268-.27-.268-.706 0-.978l7.83-7.908c.268-.27.7-.27.97 0s.267.71 0 .98L6.75 10l7.14 7.418z"/></svg></span>
		  </div>
		  <div class="slider__switch slider__switch--next" data-ikslider-dir="next">
		    <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.25 10L6.11 2.58c-.27-.27-.27-.707 0-.98.267-.27.7-.27.968 0l7.83 7.91c.268.27.268.708 0 .978l-7.83 7.908c-.268.27-.7.27-.97 0s-.267-.707 0-.98L13.25 10z"/></svg></span>
		  </div>
		</div>
		
		<p class="content_slider">Зазвичай, під словом «банер» у зовнішній рекламі розуміють тканинне полотно прямокутної форми інформаційного або рекламного змісту. У діловому середовищі також вживаються слова «розтяжка», «перетяжка», «транспарант». Всі ці вироби є ефективними інструментами зовнішньої реклами і виготовляються методом широкоформатного друку. Основним матеріалом для виготовлення банерів служать спеціальні банерні тканини (backlit, blackout, frontlit).</p>

		 <br><p class="referrel_link">Ваша реферальна силка:<br>{{ $refLink }}</p>
		
		<div class="all_banners">

			<div class="img_banner_pos">
				<img src="http://i65.tinypic.com/1znbp7q.jpg" alt="">
				<a class="download_banner" href="http://i65.tinypic.com/1znbp7q.jpg" download>Завантажити</a>
				<a class="copy_banner" href="#">Копіювати</a>
			</div>

			<div class="img_banner_pos">
				<img src="http://i67.tinypic.com/ehx5wy.jpg" alt="">
				<a class="download_banner" href="http://i67.tinypic.com/ehx5wy.jpg" download="">Завантажити</a>
				<a class="copy_banner" href="#">Копіювати</a>
			</div>

			<div class="img_banner_pos">
				<img src="http://i68.tinypic.com/nov5zt.jpg" alt="">
				<a class="download_banner" href="http://i68.tinypic.com/nov5zt.jpg" download="">Завантажити</a>
				<a class="copy_banner" href="#">Копіювати</a>
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

