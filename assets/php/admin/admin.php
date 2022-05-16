<?php
    include "../database/path.php";
    session_start();
    include "check-admin.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="../../fonts/stylesheet.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/style.min.css">
    
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
                <img src="../../images/logo.svg" alt="Atelier">
            </div>
            <button class="menu-open">
                <img src="../../images/menu-burger.svg" alt="Open menu">
            </button>
        </div>
        <div class="menu-filter">
            <div class="menu-filter-bg"></div>
        </div>
        <div class="menu-burger">
            <div class="menu-close">
                <div class="menu-close-icon">
                    <img src="../../images/menu-close.svg" alt="Close menu">
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

    <!-- admin cabinet-->
    <main class="main">
        <div class="container">
            <div class="layout layout-sidebar">
                <main class="cabinet-content">
                </main>
                <aside class="cabinet-sidebar">
                    <nav>
                        <div class="cabinet-user">
                            <a href="#" class="cabinet-nav-link cabinet-drop">
                                <div class="cabinet-nav-icon">
                                    <img src="../../images/user-icon.svg" alt="User">
                                </div>
                                <div class="cabinet-user-name">
                                    <p>
                                        <?php echo $_SESSION['login']; ?>
                                    </p>
                                </div>
                            </a>
                            <ul class="sidenav__list">
                                <li class="sidenav__item">
                                    <a href="<?php echo BASE_URL . "assets/php/database/logout.php"; ?>" class="sidenav__link">
                                        <span class="sidenav__text text-sm@md">Вийти</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <ul class="cabinet-navigation">
                            <!-- ?php echo $data->menu(); ?> -->
                            <li class="cb-nav-item">
                                <a href="users/users-index.php" class="cabinet-nav-link">
                                    <div class="cabinet-nav-icon">
                                        <img src="../../images/users-icon.svg" alt="Users">
                                    </div>
                                    <div class="cabinet-user-name">
                                        <p>Користувачі</p>
                                    </div>
                                </a>
                            </li>
                            <li class="cb-nav-item">
                                <a href="portfolio/portfolio-index.php" class="cabinet-nav-link">
                                    <div class="cabinet-nav-icon">
                                        <img src="../../images/photo-icon.svg" alt="User">
                                    </div>
                                    <div class="cabinet-user-name">
                                        <p>Портфоліо</p>
                                    </div>
                                </a>
                            </li>
                            <li class="cb-nav-item">
                                <a href="#" class="cabinet-nav-link">
                                    <div class="cabinet-nav-icon">
                                        <img src="../../images/price-icon.svg" alt="User">
                                    </div>
                                    <div class="cabinet-user-name">
                                        <p>Ціни</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </main>
    <!-- end cabinet-->

    <!-- footer -->
    <footer class="footer">
        <div class="footer__container">
            <div class="footer__elements">
                <div class="footer__main__sec">
                    <div class="footer__logo">
                        <a href="#">
                            <img src="../../images/footer_logo.svg" alt="Atelier">
                        </a>
                    </div>
                    <div class="footer__social">
                        <div class="f__social__element">
                            <a href="https://www.instagram.com/atelie_achtyrka/" target="_blank">
                                <img src="../../images/instagram_icon.svg" alt="Instagram">
                            </a>
                        </div>
                        <div class="f__social__element">
                            <a href="https://www.facebook.com/profile.php?id=100034953752105" target="_blank">
                                <img src="../../images/facebook_icon.svg" alt="Facebook">
                            </a>
                        </div>
                        <div class="f__social__element">
                            <a href="" target="_blank">
                                <img src="../../images/massenger_icon.svg" alt="Massenger">
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../../js/app.js"></script>
</body>
</html>