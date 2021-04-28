
<!DOCTYPE html>
<html>
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token"/>

        <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}" type="image/x-icon">
        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" >
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    </head>
    <body>
        <header>
        @guest
            <div class="exit">

            </div>
        @else
            <div class="exit">
                <div class=" click_exit">Admin {{ Auth::user()->name }}</div>
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
                <a href=""><div class="logo"></div></a>
                <div class="search">
                    <input class="in_serch" type="text" placeholder="Пошук котирувань, новини, документи">
                    <div class="search_submit">
                        <input class="in_submit" type="submit" value="" >
                    </div>

                </div>
            </div>

            <nav>
                <ul class="drop-menu-main">
                    <li class="home_icon">
                        <ul>
                            <a class="menu-home" href=""><li class="nav_img_home"></li></a>
                        </ul>
                    </li>

                    <li class="position-menu">
                        <span class="drop-down">Інфоредактор</span>
                        <ul class="drop-menu-main-sub">
                            <div class="open-menu"></div>
                            <div class="section_menu1 box-about">
                                <ul>
                                    <li class="menu-item">Про нас
                                        <ul class="sub_menu_second">
                                            <a href="#"><li>Хто ми?</li></a>
                                            <a href="#"><li>Як працює платформа? <br>Правила сайту</li></a>
                                            <a href="#"><li>Партнерська програма. <br>Реферальна винагорода</li></a>
                                            <a href="#"><li>Угода користувача</li></a>
                                            <a href="#"><li>Питання та відповіді</li></a>
                                            <a href="#"><li>Ми в соцмережах. Чат</li></a>
                                            <a href="#"><li>Контакти</li></a>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="section_menu2 box-news">
                                <ul>
                                    <a href="{{ route('admin.ticker.index') }}"><li class="menu-item">Бігуча стрічка</li></a>
                                </ul>
                            </div>

                            <div class="section_menu2 box-about">
                                <ul>
                                    <a href="{{ route('admin.posts.index') }}"><li class="menu-item">Створення матеріалів</li></a>
                                </ul>
                            </div>
                            <div class="section_menu3 box-about">
                                <ul>
                                    <li class="menu-item">Безпека
                                        <ul class="sub_menu_second">
                                            <a href="#"><li>Конфіденційність</li></a>
                                            <a href="#"><li>Складні паролі</li></a>
                                            <a href="#"><li>Обмеженість прав доступу</li></a>
                                            <a href="#"><li>Захист VOD-контенту</li></a>
                                            <a href="#"><li>Антивіруси</li></a>
                                            <a href="#"><li>Аутентифікація</li></a>
                                            <a href="#"><li>Шифрування</li></a>
                                            <a href="#"><li>HTTPS. Криптографічний захист. Сертифікати SSL</li></a>
                                            <a href="#"><li>Фільтрація даних. Захист від атак XSS</li></a>
                                            <a href="#"><li>Реагування на DDoS-атаки</li></a>
                                            <a href="#"><li>Резервне копіювання</li></a>
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
                                    <li class="menu-item">Платіжні системи
                                        <ul class="sub_menu_second">
                                            <a href="#"><li>ePayments</li></a>
                                            <a href="#"><li>Advanced Cash</li></a>
                                            <a href="#"><li>Payeer</li></a>
                                            <a href="#"><li>PayPal</li></a>
                                            <a href="#"><li>SolidTrustPay</li></a>
                                            <a href="#"><li>Neteller</li></a>
                                            <a href="#"><li>Skrill</li></a>
                                            <a href="#"><li>Qiwi</li></a>
                                            <a href="#"><li>BestChange</li></a>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="section_menu2 box-news">
                                <ul>
                                    <a href="#"><li class="menu-item">Заявки на поповнення особових рахунків інвесторів</li></a>
                                </ul>
                            </div>

                            <div class="section_menu3 box-news">
                                <ul>
                                    <a href="#"><li class="menu-item">Заявки на виведення валюти на гаманці інвесторів</li></a>
                                </ul>
                            </div>

                            <div class="section_menu4 box-news">
                                <ul>
                                    <a href="#"><li class="menu-item">Анкети. Рахунки електронних гаманців інвесторів</li></a>
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
                                    <a href="{{ route('admin.tokens.own-tokens') }}"><li class="menu-item">Таблиця розподілу токенів по періодах емісії</li> </a>
                                </ul>
                            </div>

                            <div class="section_menu2 box-finansse">
                                <ul>
                                    <a href="#"><li class="menu-item">Таблиця розподілу токенів в рефкомандах афіліата</li></a>
                                </ul>
                            </div>

                            <div class="section_menu3 box-finansse">
                                <ul>
                                    <a href="{{ route('admin.tokens.not-active-lot')  }}"><li class="menu-item">Неактивовані лоти аукціону</li></a>
                                    <a href="#"><li class="menu-item">Активовані лоти аукціону</li></a>
                                </ul>
                            </div>

                            <div class="section_menu4 box-finansse">
                                <ul>
                                    <a href="#"><li class="menu-item">Акційні токени
                                    </li></a>
                                    <a href="#"><li class="menu-item">Токени віртуального інвестора</li></a>

                                </ul>
                            </div>
                        </ul>
                    </li>

                    <li>
                        <span class="drop-down">Рефкоманди</span>
                        <ul class="drop-menu-main-sub">
                            <div class="open-menu"></div>
                            <div class="section_menu1 box-security">
                                <ul>
                                    <a href="#"><li class="menu-item">Рефпосилання. Банери (бібліотека)</li></a>
                                </ul>
                            </div>
                            <div class="section_menu2 box-security">
                                <ul>
                                    <a href="#"><li class="menu-item">Афіліати і їх рефкоманди</li></a>
                                </ul>
                            </div>
                            <div class="section_menu3 box-security">
                                <ul>
                                    <a href="#"><li class="menu-item">Фінансова активність рефкоманд.</li></a>
                                </ul>
                            </div>
                            <div class="section_menu4 box-security">
                                <ul>
                                </ul>
                            </div>
                        </ul>
                    </li>

                    <li class="position-menu">
                        <span class="drop-down">Статистика</span>
                        <ul class="drop-menu-main-sub">
                            <div class="open-menu"></div>
                            <div class="section_menu1 box-language">
                                <ul>
                                    <a href="{{ route('admin.statistics.auction-history') }}"><li class="menu-item">Історія транзакцій аукціону</li></a>
                                    <a href="#"><li class="menu-item">Історія поповнення особових рахунків інвесторів</li></a>
                                    <a href="#"><li class="menu-item">Історія виведення валюти інвесторів</li></a>
                                </ul>
                            </div>
                            <div class="section_menu2 box-language">
                                <ul>
                                    <a href="#"><li class="menu-item">Історія виведення інвестованої в токени валюти</li></a>
                                    <a href="#"><li class="menu-item">Статистика транзакцій аукціону</li></a>
                                    <a href="#"><li class="menu-item">Статистика поповнення особових рахунків інвесторів</li></a>
                                </ul>
                            </div>
                            <div class="section_menu3 box-language">
                                <ul>
                                    <a href="#"><li class="menu-item">Статистика виведення валюти інвесторами</li></a>
                                    <a href="#"><li class="menu-item">Статистика виведення інвестованої в токени валюти</li></a>
                                </ul>
                            </div>
                            <div class="section_menu4 box-language">
                                <ul>
                                    <a href="#"><li class="menu-item">Статистика реєстрацій рефералів</li></a>
                                    <a href="#"><li class="menu-item">Статистика фінансової активності</li></a>
                                </ul>
                            </div>
                        </ul>
                    </li>

                    <li>
                        <span style="padding-top: 15px; line-height: 20px;" class="drop-down">Редактор бази даних</span>
                        <ul class="drop-menu-main-sub">
                            <div class="open-menu"></div>
                            <div class="section_menu1 box-exit">
                                <ul>
                                    <a href="#"><li class="menu-item">Валюта. Курс обміну</li></a>
                                    <a href="#"><li class="menu-item">Особові профілі інвесторів</li></a>
                                </ul>
                            </div>
                            <div class="section_menu2 box-exit">
                                <ul>
                                    <a href="#"><li class="menu-item">Мій профіль</li></a>
                                    <a href="{{ route('admin.edit-BD.own-tokens') }}"><li class="menu-item">Таблиця розподілу токенів по періодах емісії</li></a>
                                </ul>
                            </div>
                            <div class="section_menu3 box-exit">
                                <ul>
                                    <a href="{{ route('admin.edit-BD.investor-budget') }}"><li class="menu-item">Таблиця бюджету інвесторів</li></a>
                                </ul>
                            </div>
                            <div class="section_menu4 box-exit">
                                <ul>
                                    <a href="#"><li class="menu-item">Заблоковані акаунти інвесторів</li></a>
                                </ul>
                            </div>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

    <div>
        @yield('content')
    </div>

        <script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js'></script>
        <script src="{{ URL::asset('js/main.js') }}"></script>
        <script src="{{ URL::asset('js/rails.js') }}"></script>
        <script src="{{ URL::asset('js/sockets.js') }}"></script>
    </body>
</html>
