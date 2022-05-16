<?php
    include "assets/php/database/path.php";
    include "assets/php/database/users.php";
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="assets/fonts/stylesheet.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.min.css">
    
    <!-- Useful meta tags -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="">
    
    <title>Ателье по ремонту и пошиву одежды | ATELIER</title>
</head>
<body>
    <!-- header -->
    <header class="header">
        <div class="header__container">
            <div class="header__logo">
                <img src="assets/images/logo.svg" alt="Atelier">
            </div>
            <div class="header__nav">
                <nav class="nav">
                   <ul class="nav__list">
                        <li>
                            <a href="index.html" class="nav__link">Главная</a>
                        </li>
                        <li>
                            <a href="#" class="nav__link">Услуги</a>
                            <ul class="nav__sub-list">
                                <li>
                                    <a href="" class="nav__sub-link">Ремонт одежды</a>
                                </li>
                                <li>
                                    <a href="" class="nav__sub-link">Пошив одежды</a>
                                </li>
                                <li>
                                    <a href="" class="nav__sub-link">Перешив одежды</a>
                                </li>
                                <li>
                                    <a href="" class="nav__sub-link">Пошив одежды</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="portfolio.html" class="nav__link">Портфолио</a>
                        </li>
                        <li>
                            <a href="#" class="nav__link">О нас</a>
                        </li>
                        <li>
                            <a href="#" class="nav__link" style="padding: 0;">Контакты</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header__contacts">
                <img src="assets/images/telephone.svg" alt="telephone">
                <a href="tel: +380955410504" class="tel">+38 095 541 05 04</a>
            </div>
            <button class="menu-open">
                <img src="assets/images/menu-burger.svg" alt="Open menu">
            </button>
        </div>
        <div class="menu-filter">
            <div class="menu-filter-bg"></div>
        </div>
        <div class="menu-burger">
            <div class="menu-close">
                <div class="menu-close-icon">
                    <img src="assets/images/menu-close.svg" alt="Close menu">
                </div>
            </div>
            <div class="menu-container">
                <div class="menu-top">
                    <ul class="menu-list">
                        <li class="menu-item">
                            <a href="index.html" class="menu-link">Главная</a>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                Услуги
                                <div class="item-arrow"></div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                Ремонт
                                <div class="item-arrow"></div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                Пошив
                                <div class="item-arrow"></div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="portfolio.html" class="menu-link">Портфолио</a>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu-link">О нас</a>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu-link">Контакты</a>
                        </li>
                        <li class="menu-item">
                            <a href="tel: +380955410504" class="menu-link">+38 095 541 05 04</a>
                        </li>
                    </ul>
                </div>
            </div>
    
        </div>
    </header>
    <!-- end header -->

    <!-- form reg -->
    <main class="main">
        <div class="container">
            <form class="lg-form" method="post" action="reg.php">
                <h2 class="lg-form-tl">Регистрация</h2>
                <div class="lg-form-msg">
                    <p><?=$errMsg?></p>
                </div>
                <div class="lg-form-items">
                    <div class="lg-form-item">
                        <input name="login" type="text" id="formLogin" placeholder="Введите логин" class="lg-form-inp">
                    </div>
                    <div class="lg-form-item">
                        <input name="password" type="password" id="formPass" placeholder="Введите пароль" class="lg-form-inp">
                    </div>
                    <div class="lg-form-item">
                        <button type="submit" class="lg-form-btn" name="button-rg">Зарегистрировать</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- end form -->


    <!-- footer -->
    <footer class="footer">
        <div class="footer__container">
            <div class="footer__elements">
                <div class="footer__main__sec">
                    <div class="footer__logo">
                        <a href="#">
                            <img src="assets/images/footer_logo.svg" alt="Atelier">
                        </a>
                    </div>
                    <div class="footer__social">
                        <div class="f__social__element">
                            <a href="https://www.instagram.com/atelie_achtyrka/" target="_blank">
                                <img src="assets/images/instagram_icon.svg" alt="Instagram">
                            </a>
                        </div>
                        <div class="f__social__element">
                            <a href="https://www.facebook.com/profile.php?id=100034953752105" target="_blank">
                                <img src="assets/images/facebook_icon.svg" alt="Facebook">
                            </a>
                        </div>
                        <div class="f__social__element">
                            <a href="" target="_blank">
                                <img src="assets/images/massenger_icon.svg" alt="Massenger">
                            </a>
                        </div>
                    </div>
                    <div class="footer__text">
                        <h2>
                        © Atelier<br><br>
                        095 541 05 04<br>
                        Консультация и прием заказов по всей Украине<br>
                        Ахтырка, ул. Универмаг, 2Б
                        </h2>
                    </div>
                </div>
                <div class="footer__sec">
                    <div class="f-sec-title">О нас</div>
                    <div class="f-sec-elements">
                        <ul>
                            <li>
                                <a href="" class="f-sec-elem">О нас</a>
                            </li>
                            <li>
                                <a href="" class="f-sec-elem">Контакты</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer__sec">
                    <div class="f-sec-title">Информация</div>
                    <div class="f-sec-elements">
                        <ul>
                            <li>
                                <a href="" class="f-sec-elem" >Цены</a>
                            </li>
                            <li>
                                <a href="" class="f-sec-elem" >Отзывы</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer__sec">
                    <div class="f-sec-title">Блог</div>
                    <div class="f-sec-elements">
                        <ul>
                            <li>
                                <a href="" class="f-sec-elem" >Курсы</a>
                            </li>
                            <li>
                                <a href="" class="f-sec-elem" >Работа</a>
                            </li>
                            <li>
                                <a href="" class="f-sec-elem">О ремонте</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>