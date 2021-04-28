
<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}" type="image/x-icon">
        <title>{{ config('app.name') }}</title>


        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">

    </head>
    <body>
        <header>
        @guest
            <div class="exit">

                <div class="login">
                    <div class="img_login"></div>
                    <div class="name_login">LOGIN</div>
                    <div class="click">
                        <div class="arrow_top"></div>
                        <div class="arrow_bottom"></div>
                    </div>
                </div>
                <form form method="POST" action="{{ route('login') }}" class="login_form">
                        @csrf
                    <input  id="email" class="username" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Логін" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    <input id="password" class="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="Пароль" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                         @endif

                    <button class="go" type="submit">
                                    {{ __('Вхід') }}
                    </button>

                    <a href="{{ route('password.request') }}" class="forgotten_password">Забули пароль?</a>
                    <div class="bottom_active_login">
                        <span class="close_click">Назад</span>
                    </div>
                </form>

               <!-- ************** -->
                <div class="nav__lang">
                    <div class="nav__lang--current">
                      <img src="../img/icon flags/ua.svg">
                  </div><div class="nav__lang--options">
                    <a class="nav__lang--option" href="#"> <img src="../img/icon flags/en.svg"></a>
                    <a class="nav__lang--option" href="#"> <img src="../img/icon flags/rus.jpg"></a>
                  </div>
                </div>
               <!-- ************** -->

                <div class="rigister"><a href="{{ route('register') }}">НОВИЙ КОРИСТУВАЧ ? ЗАРЕЄСТРУЙСЯ ТУТ</a></div>
                <div style="clear: both;"></div>
            </div>
        @else



            <div class="exit">
                <div class=" click_exit">{{ Auth::user()->name }}🠟</div>
                <!-- ************** -->
                    <div class="nav__lang">
                        <div class="nav__lang--current">
                          <img src="/img/icon flags/ua.svg">
                      </div><div class="nav__lang--options">
                        <a class="nav__lang--option" href="#"> <img src="/img/icon flags/en.svg"></a>
                        <a class="nav__lang--option" href="#"> <img src="/img/icon flags/rus.jpg"></a>
                      </div>
                    </div>
                <!-- ************** -->
            </div>
            <div class="login_exit">

                    <a class="logout_exit" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

            </div>


        @endguest

            <div class="prime_head">
                <a href="{{ route('/') }}"><div class="logo"></div></a>
                <div class="search">
                    <input class="in_serch" type="text" placeholder="Пошук котирувань, новини, документи">
                    <div class="search_submit">
                        <input class="in_submit" type="submit" value="" >
                    </div>

                </div>

                <div class="search_768">
                    <input class="in_serch_768" type="text" placeholder="Пошук котирувань, новини, документи">
                    <div class="search_submit_768">
                        <input class="in_submit_768" type="submit" value="" >
                    </div>

                </div>
                <div style="clear: both;"></div>
            </div>
    @guest
        <nav>
            <ul class="drop-menu-main">
                <li class="home_icon">
                    <ul>
                        <a class="menu-home" href=""><li class="nav_img_home"></li></a>
                    </ul>
                </li>

                <li class="position-menu">
                    <span class="drop-down">Гостьова сторінка</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-about">
                            <ul>
                                <a href="{{ route('/') }}"><li class="menu-item">Хто ми?</li></a>
                                <a href="{{ url('rules') }}"><li class="menu-item">Як працює платформа? Правила сайту</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-about">
                            <ul>
                                <a href="{{ url('aboutUs/affiliate-program') }}"><li class="menu-item">Партнерська програма. Реферальна винагорода</li></a>
                                <a href="{{ url('aboutUs/user-agreement') }}"><li class="menu-item">Угода користувача</li></a>
                            </ul>
                        </div>
                        <div class="section_menu3 box-about">
                            <ul>
                                <a href="{{ url('aboutUs/chat') }}"><li class="menu-item">Питання та відповіді</li></a>
                                <a href="{{ url('aboutUs/networks') }}"><li class="menu-item">Ми в соцмережах. Чат</li></a>
                            </ul>
                        </div>
                        <div class="section_menu4 box-about">
                            <ul>
                                <a href="{{ url('contact') }}"><li class="menu-item">Контакти</li></a>
                            </ul>
                        </div>
                    </ul>
                </li>

                <li>
                    <span class="drop-down">Менеджмент</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-news">
                            <ul>
                                <a href="{{ url('management',$category='ourEvent') }}"><li class="menu-item">Акції компанії</li></a>
                            </ul>
                        </div>

                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='corporateNews') }}"><li class="menu-item">Новини компанії</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='UkrainianNews') }}"><li class="menu-item">Огляд новин в Україні</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='worldNews') }}"><li class="menu-item">Огляд новин у світі</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='topBrand') }}"><li class="menu-item">Лідери світового ринку</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='technology') }}"><li class="menu-item">Нові технології, спецприбори, робототехніка</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='education') }}"><li class="menu-item">Нові стандарти освіти</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='enerdge') }}"><li class="menu-item">Системи видобутку та збереження альтернативної енергії</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='service') }}"><li class="menu-item">Технічне та сервісне обслуговування</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='marketing') }}"><li class="menu-item">Маркетинг. Огляд методів та технік</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ url('management',$category='business') }}"><li class="menu-item">Комерція, валютний та фондовий ринок. Огляд методів і технік</li></a>
                            </ul>
                        </div>

                        <div class="section_menu4 box-news">
                        </div>
                    </ul>
                </li>

                <li class="position-menu">
                    <span class="drop-down">Фінанси</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-finansse">
                            <ul>
                                <a href="{{ url('finances/chargeable-systems') }}"><li class="menu-item">Платіжні системи</li></a>
                                <a href="{{ url('finances/multicurrency') }}"><li class="menu-item">Мультивалютність</li></a>
                            </ul>
                        </div>

                        <div class="section_menu2 box-finansse">
                            <ul>
                                <a href="{{ url('finances/tokenPrice') }}"> <li class="menu-item">Вартість токена</li></a>
                                <a href="{{ url('finances/tokenAuction') }}"><li class="menu-item">Аукціон токенів</li></a>
                            </ul>
                        </div>

                        <div class="section_menu3 box-finansse">
                            <ul>
                                <a href="{{ url('finances/protection-fund') }}"><li class="menu-item">Фонд захисту інвестиційних вкладів</li></a>
                                <a href="{{ url('finances/investment-portfolio') }}"><li class="menu-item">Інвестиційний портфель</li></a>
                            </ul>
                        </div>

                        <div class="section_menu4 box-finansse">
                            <ul>
                                <li class="menu-item"><a href="{{ url('finances/typesOfInvestmentRewards') }}">Види інвестиційної винагороди</a>
                                </li>
                            </ul>
                            <div class="subclass_for_menu">
                                <ul>
                                    <li><a href="{{ url('finances/dividends') }}">Дивіденди</a></li>
                                    <li><a href="{{ url('finances/type-investment-rewards') }}">Продаж токенів через аукціон</a></li>
                                    <li><a href="{{ url('finances/referralReward') }}">Реферальна винагорода</a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>

                <li>
                    <span class="drop-down">Безпека</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-security">
                            <ul>
                                <a href="{{ url('security/part-1') }}#confidens"><li class="menu-item">Конфіденційність</a></li></a>
                                <a href="{{ url('security/part-1') }}#complex_passwords"><li class="menu-item">Складні паролі</li></a>
                                <a href="{{ url('security/part-1') }}#limitation"><li class="menu-item">Обмеженість прав доступу</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-security">
                            <ul>
                                <a href="{{ url('security/part-2') }}#VOD"><li class="menu-item">Захист VOD-контенту</li></a>
                                <a href="{{ url('security/part-2') }}#antivirus"><li class="menu-item">Антивіруси</li></a>
                                <a href="{{ url('security/part-2') }}#auth_security"><li class="menu-item">Аутентифікація</li></a>
                            </ul>
                        </div>
                        <div class="section_menu3 box-security">
                            <ul>
                                <a href="{{ url('security/part-3') }}#encryption"><li class="menu-item">Шифрування</li></a>
                                <a href="{{ url('security/part-3') }}#HTTPS_SSL"><li class="menu-item">HTTPS. Криптографічний захист. Сертифікати SSL</li></a>
                                <a href="{{ url('security/part-3') }}#XSS_security"><li class="menu-item">Фільтрація даних. Захист від атак XSS</li></a>
                            </ul>
                        </div>
                        <div class="section_menu4 box-security">
                            <ul>
                                <a href="{{ url('security/part-4') }}#DDoS_security"><li class="menu-item">Реагування на DDoS-атаки</li></a>
                                <a href="{{ url('security/part-4') }}#backup"><li class="menu-item">Резервне копіювання</li></a>
                            </ul>
                        </div>
                    </ul>
                </li>

                <li class="position-menu">
                    <span class="drop-down">Лотерея</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-language">
                            <ul>
                                <a href="">
                                    <l></l>
                                </a>
                                <a href="">
                                    <l></l>
                                </a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-language">
                            <ul>
                                <a href="">
                                    <l></l>
                                </a>
                                <a href="">
                                    <l></l>
                                </a>
                            </ul>
                        </div>
                        <div class="section_menu3 box-language">
                            <ul>
                                <a href="">
                                    <l></l>
                                </a>
                                <a href="">
                                    <l></l>
                                </a>
                            </ul>
                        </div>
                        <div class="section_menu4 box-language">
                            <ul>
                                <a href="">
                                    <l></l>
                                </a>
                                <a href="">
                                    <l></l>
                                </a>
                            </ul>
                        </div>
                    </ul>
                </li>

                <li>
                    <span class="drop-down">Вхід</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-exit">
                            <ul>
                                <a href="{{ route('login') }}"><li class="menu-item">Вхід</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-exit">
                            <ul>
                                <a href="{{ route('password.request') }}"><li class="menu-item">Забули пароль або нік</li></a>
                            </ul>
                        </div>
                        <div class="section_menu3 box-exit">
                            <ul>
                                <a href="{{ route('register') }}"><li class="menu-item">Зареєструватися</li></a>
                            </ul>
                        </div>
                        <div class="section_menu4 box-exit">
                            <ul>
                            </ul>
                        </div>
                    </ul>
                </li>
            </ul>
        </nav>
    @else
        <nav>
            <ul class="drop-menu-main">
                <a class="menu-home home_icon" href="{{ route('cabinet') }}"><li class="" >
                    <ul>
                       <li class="nav_img_home"></li>
                    </ul>
                </a></li>

                <li class="position-menu">
                    <span class="drop-down">Інфолист</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-about">
                            <ul class="">
                                <li class="menu-item click_about_menu">Про нас
                                    <ul class="sub_menu_second">
                                        <a href="#"><li>Хто ми?</li></a>
                                        <a href="#"><li>Як працює платформа? <br>Правила сайту</li></a>
                                        <a href="#"><li>Партнерська програма. <br>Реферальна
                                        винагорода</li></a>
                                        <a href="#"><li>Угода користувача</li></a>
                                        <a href="#"><li>Питання та відповіді</li></a>
                                        <a href="#"><li>Ми в соцмережах. Чат</li></a>
                                        <a href="#"><li>Контакти</li></a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="section_menu2 box-about">
                            <ul>
                                <li class="menu-item">Менеджмент
                                    <ul class="sub_menu_second">
                                        <a href="{{ url('cabinet/management',$category='ourEvent') }}"><li>Акції компанії</li></a>
                                        <a href="{{ url('cabinet/management',$category='corporateNews') }}"><li>Новини компанії</li></a>
                                        <a href="{{ url('cabinet/management',$category='UkrainianNews') }}"><li>Огляд новин в Україні</li></a>
                                        <a href="{{ url('cabinet/management',$category='worldNews') }}"><li>Огляд новин у світі</li></a>
                                        <a href="{{ url('cabinet/management',$category='topBrand') }}"><li>Лідери світового ринку</li></a>
                                        <a href="{{ url('cabinet/management',$category='technology') }}"><li>Нові технології, спецприбори, робототехніка</li></a>
                                        <a href="{{ url('cabinet/management',$category='education') }}"><li>Нові стандарти освіти</li></a>
                                        <a href="{{ url('cabinet/management',$category='enerdge') }}"><li>Системи видобутку та збереження альтернативної енергії</li></a>
                                        <a href="{{ url('cabinet/management',$category='service') }}"><li>Технічне та сервісне обслуговування</li></a>
                                        <a href="{{ url('cabinet/management',$category='marketing') }}"><li>Маркетинг. Огляд методів та технік</li></a>
                                        <a href="{{ url('cabinet/management',$category='business') }}"><li>Комерція, валютний та фондовий ринок. Огляд методів і технік</li></a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="section_menu3 box-about">
                            <ul>
                                <li class="menu-item">Безпека
                                    <ul class="sub_menu_second">
                                        <a href="{{ url('security/part-1') }}#confidens"><li>Конфіденційність</li></a>
                                        <a href="{{ url('security/part-1') }}#complex_passwords"><li>Складні паролі</li></a>
                                        <a href="{{ url('security/part-1') }}#limitation"><li>Обмеженість прав доступу</li></a>
                                        <a href="{{ url('security/part-2') }}#VOD"><li>Захист VOD-контенту</li></a>
                                        <a href="{{ url('security/part-2') }}#antivirus"><li>Антивіруси</li></a>
                                        <a href="{{ url('security/part-2') }}#auth_security"><li>Аутентифікація</li></a>
                                        <a href="{{ url('security/part-3') }}#encryption"><li>Шифрування</li></a>
                                        <a href="{{ url('security/part-3') }}#HTTPS_SSL"><li>HTTPS. Криптографічний захист. Сертифікати SSL</li></a>
                                        <a href="{{ url('security/part-3') }}#XSS_security"><li>Фільтрація даних. Захист від атак XSS</li></a>
                                        <a href="{{ url('security/part-4') }}#DDoS_security"><li>Реагування на DDoS-атаки</li></a>
                                        <a href="{{ url('security/part-4') }}#backup"><li>Резервне копіювання</li></a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="section_menu4 box-about">
                            <ul>
                            </ul>
                        </div>
                        <div class="clearer"></div>
                    </ul>
                </li>

                <li>
                    <span class="drop-down">Фінанси</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-news">
                            <ul>
                                <a href="{{ route('homeFinance') }}"><li class="menu-item">Головна</li></a>
                                <a href="#"><li class="menu-item">Платіжні системи
                                    <ul class="sub_menu_second">
                                        <a href="{{ route('payeer') }}"><li>Payeer</li></a>
                                        <a href="{{ route('paypal') }}"><li>PayPal</li></a>
                                        <a href="{{ route('skrill') }}"><li>Skrill</li></a>
                                        <a href="{{ route('paybank') }}"><li>24paybank</li></a>
                                        <a href="{{ route('kuna') }}"><li>kuna</li></a>
                                        <a href="{{ route('bestChange') }}"><li>BestChange</li></a>
                                    </ul>
                                </li></a>
                            </ul>
                        </div>

                        <div class="section_menu2 box-news">
                            <ul>
                                <a href="{{ route('replenishment')}}"><li class="menu-item">Сформувати заявку на поповнення основного рахунку</li></a>
                                <a href="{{ route('withdrawFunds')}}"><li class="menu-item">Сформувати заявку на виведення валюти</li></a>
                            </ul>
                        </div>

                        <div class="section_menu3 box-news">
                            <ul>
                                <a href="{{ route('accountsWallets') }}"><li class="menu-item">Рахунки власних електронних гаманців</li></a>
                                <a href="{{ route('transactionHistory') }}"><li class="menu-item">Історія проведених власних транзакцій з поповнення та виводу валюти</li></a>
                            </ul>
                        </div>

                        <div class="section_menu4 box-news">
                            <ul>
                               <a href="{{ route('rewardHistory') }}"> <li class="menu-item">Історія нарахування прибутків щомісячної інвестиційної винагороди (дивідендів) та прибутків від аукціонних торгів рефкоманди</li></a>
                            </ul>
                        </div>
                    </ul>
                </li>

                <li class="position-menu">
                    <span class="drop-down">Токени</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-finansse">
                            <ul>
                                <a href="{{ url('cabinet/tokens/ownTokens') }}"><li class="menu-item">Таблиця розподілу токенів по періодах емісії</li> </a>
                                <a href="{{ url('cabinet/tokens/referralsTokens') }}"><li class="menu-item">Таблиця розподілу токенів рефералів своєї команди</li></a>
                            </ul>
                        </div>

                        <div class="section_menu2 box-finansse">
                            <ul>
                                <a href="{{ url('cabinet/tokens/noActive') }}"><li class="menu-item">Неактивовані лоти аукціону</li></a>
                                <a href="{{ url('cabinet/tokens/activeLot') }}"><li class="menu-item">Активовані лоти аукціону</li></a>
                            </ul>
                        </div>

                        <div class="section_menu3 box-finansse">
                            <ul>
                                <a href="{{ url('cabinet/tokens/historyTrades') }}"><li class="menu-item">Історія власних торгів (купівля, продаж) на аукціоні
                                </li></a>
                            </ul>
                        </div>

                        <div class="section_menu4 box-finansse">
                            <ul>
                                <a href="{{ url('cabinet/tokens/historyRefferalLot') }}"><li class="menu-item">Історія торгів на аукціоні за участю рефералів своєї команди</li></a>

                            </ul>
                        </div>
                    </ul>
                </li>

                <li>
                    <span class="drop-down">Рефкоманда</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-security">
                            <ul>
                                <a href="{{ url('cabinet/referrals/banners') }}"><li class="menu-item">Рефпосилання. Банери (бібліотека)</li></a>
                                <a href="{{ url('cabinet/referrals/structure') }}"><li class="menu-item">Структура власної рефкоманди</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-security">
                            <ul>
                                <a href="{{ url('cabinet/referrals/activeTeam') }}"><li class="menu-item">Фінансова активність власної рефкоманди</li></a>
                            </ul>
                        </div>
                        <div class="section_menu3 box-security">
                            <ul>
                                <a href="{{ url('cabinet/referrals/referralForm') }}"><li class="menu-item">Анкетні дані рефералів власної рефкоманди (обмежені)</li></a>
                            </ul>
                        </div>
                        <div class="section_menu4 box-security">
                            <ul>
                                <a href="{{ url('cabinet/referrals/privateChat') }}"><li class="menu-item">Чат рефкоманди (особистий афіліат + власні реферали)</li></a>
                            </ul>
                        </div>
                    </ul>
                </li>

                <li class="position-menu">
                    <span class="drop-down">Лотерея</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-language">
                            <ul>
                                <a href="">
                                    <l></l>
                                </a>
                                <a href="">
                                    <l></l>
                                </a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-language">
                            <ul>
                                <a href="">
                                    <l></l>
                                </a>
                                <a href="">
                                    <l></l>
                                </a>
                            </ul>
                        </div>
                        <div class="section_menu3 box-language">
                            <ul>
                                <a href="">
                                    <l></l>
                                </a>
                                <a href="">
                                    <l></l>
                                </a>
                            </ul>
                        </div>
                        <div class="section_menu4 box-language">
                            <ul>
                                <a href="">
                                    <l></l>
                                </a>
                                <a href="">
                                    <l></l>
                                </a>
                            </ul>
                        </div>
                    </ul>
                </li>

                <li>
                    <span class="drop-down">Профіль</span>
                    <ul class="drop-menu-main-sub">
                        <div class="open-menu"></div>
                        <div class="section_menu1 box-exit">
                            <ul>

                                <a href="{{ route('profile', $user) }}"><li class="menu-item">Редагувати профіль</li></a>
                            </ul>
                        </div>
                        <div class="section_menu2 box-exit">
                            <ul>
                                <a href="#"><li class="menu-item">Номери особових рахунків електронних гаманців платіжних систем</li></a>
                            </ul>
                        </div>
                        <div class="section_menu3 box-exit">
                            <ul>
                                <a href="{{ url('cabinet/edit-auth') }}"><li class="menu-item"> Редагування даних авторизації</li></a>
                            </ul>
                        </div>
                        <div class="section_menu4 box-exit">
                            <ul>
                            </ul>
                        </div>
                    </ul>
                </li>
            </ul>
        </nav>
    @endguest

    <div>
        @yield('content')
    </div>
        </header>

        <div id="new_lot_on_auction_success" class="confirmation-you_bought_success">
            <div class="you_bought_success">
                <p></p>
            </div>
        </div>

        <div id="new_lot_on_auction_error" class="confirmation-you_bought_error">
            <div class="you_bought_error">
                <p></p>
            </div>
        </div>

        <div id="lot_was_bit" class="timeout">
            <div class="timeout_content">
                <table>
                    <tr>
                        <td>
                            <div>Ставку на лоті №:</div>
                            <div></div>
                            <div>було перебито іншим інвестором.</div>
                            <div>Перейти до аукціону?</div>
                        </td>
                    </tr>

                    <tr>
                        <td><a href="{{ url('cabinet') }}"><button>OK</button></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="to_late" class="timeout">
            <div class="timeout_content">
                <table>
                    <tr>
                        <td>Ви не встигли зробити ставку! <br>
                            Ставка лоту перебита іншим гравцем! <br>
                            Спробуйте знову!</td>
                    </tr>
                    <tr>
                        <td><button id="close_to_late">OK</button></td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="lot_take_off" class="timeout">
            <div class="timeout_content">
                <table>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td><button id="close_lot_take_off">OK</button></td>
                    </tr>
                </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.0.min.js"
                integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
                crossorigin="anonymous"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js'></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.slim.js"></script>

        <script src="{{ URL::asset('js/main.js') }}"></script>
        <script src="{{ URL::asset('js/rails.js') }}"></script>
        <script src="{{ URL::asset('js/sockets.js') }}"></script>
    </body>

</html>

