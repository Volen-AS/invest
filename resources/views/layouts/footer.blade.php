<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <footer>
    <div id="running_line" class="running_line">
        <h1 class="marquee"><span>{{$ticker}}</span></h1>
    </div>

    <div class="fot">
      <div class="about_footer">
        <span class="title">Про нас.</span><br>

        <a href="">Хто ми?</a><br>
        <a href="">Як працює платформа? <br><span class="padding_left">Правила сайту.</span></a><br>
        <a href="">Партнерська програма. <br><span class="padding_left">Реферальна винагорода.</span></a><br>
        <a href="">Угода користувача.</a><br>
        <a href="">Питання та відповіді.</a><br>
        <a href="">Ми в соцмережах. Чат.</a><br>
        <a href="">Контакти.</a>

      </div>
      <div class="news_footer">
        <span class="title">Новини.</span><br>
        <a href="">Новини.</a><br>
        <a href="">ЗМІ про нас.</a><br>
        <a href="">Акції.</a>
      </div>
      <div class="finansse_footer">
        <span class="title">Фінанси.</span> <br>
        <a href="">Платіжні системи.</a><br>
        <a href="">Мультивалютність.</a><br>
        <a href="">Вартість токена.</a><br>
        <a href="">Аукціон токенів.</a><br>
        <a href="">Фонд захисту інвестиційних вкладів.</a><br>
        <a href="">Інвестиційний портфель.</a><br>
        <a href="" style="font-weight: 600;">Види інвестиційної винагороди.</a><br>
        <div class="under_news_footer">
          <a href="">Дивіденди.</a><br>
          <a href="">Продаж токенів через аукціон.</a><br>
          <a href="">Реферальна винагорода.</a>
        </div>
      </div>
      <div class="security_footer">
        <span class="title">Безпека.</span>  <br>
        <a href="{{ url('security/part-1') }}#confidens">Конфіденційність</a>
        <br>
        <a href="{{ url('security/part-1') }}#complex_passwords">Складні паролі</a>
        <br>
        <a href="{{ url('security/part-1') }}#limitation">Обмеженість прав доступу</a>
        <br>
        <a href="{{ url('security/part-2') }}#VOD">Захист VOD-контенту</a>
        <br>
        <a href="{{ url('security/part-2') }}#antivirus">Антивіруси</a>
        <br>
        <a href="{{ url('security/part-2') }}#auth_security">Аутентифікація</a>
        <br>
        <a href="{{ url('security/part-3') }}#encryption">Шифрування</a>
        <br>
        <a href="{{ url('security/part-3') }}#HTTPS_SSL">HTTPS. Криптографічний захист <br><span class="padding_left">Сертифікати SSL.</span></a>
        <br>
        <a href="{{ url('security/part-3') }}#XSS_security">Фільтрація даних <br><span class="padding_left">Захист від атак XSS.</span></a>
        <br>
        <a href="{{ url('security/part-4') }}#DDoS_security">Реагування на DDoS-атаки</a>
        <br>
        <a href="{{ url('security/part-4') }}#backup">Резервне копіювання</a>
      </div>
      <div style="clear: both;"></div>
    </div>
  </footer>

</body>
</html>
