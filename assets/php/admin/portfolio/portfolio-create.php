<?php
    include "../../database/path.php";
    include "../../controller/portfolio.php";
    include "../check-admin.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="../../../fonts/stylesheet.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../css/style.min.css">
    
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
                <img src="../../../images/logo.svg" alt="Atelier">
            </div>
            <button class="menu-open">
                <img src="../../../images/menu-burger.svg" alt="Open menu">
            </button>
        </div>
        <div class="menu-filter">
            <div class="menu-filter-bg"></div>
        </div>
        <div class="menu-burger">
            <div class="menu-close">
                <div class="menu-close-icon">
                    <img src="../../../images/menu-close.svg" alt="Close menu">
                </div>
            </div>
            <div class="menu-container">
                <nav>
                    <div class="cabinet-user">
                        <a href="#" class="cabinet-nav-link cabinet-drop">
                            <div class="cabinet-nav-icon">
                                <img src="../../../images/user-icon.svg" alt="User">
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
                            <a href="../users/users-index.php" class="cabinet-nav-link">
                                <div class="cabinet-nav-icon">
                                    <img src="../../../images/users-icon.svg" alt="Users">
                                </div>
                                <div class="cabinet-user-name">
                                    <p>Користувачі</p>
                                </div>
                            </a>
                        </li>
                        <li class="cb-nav-item">
                            <a href="portfolio-index.php?page=1" class="cabinet-nav-link nv-link-active">
                                <div class="cabinet-nav-icon">
                                    <img src="../../../images/photo-icon.svg" alt="User">
                                </div>
                                <div class="cabinet-user-name">
                                    <p>Портфоліо</p>
                                </div>
                            </a>
                        </li>
                        <li class="cb-nav-item">
                            <a href="#" class="cabinet-nav-link poslygi-drop">
                                <div class="cabinet-nav-icon">
                                    <img src="../../../images/price-icon.svg" alt="User">
                                </div>
                                <div class="cabinet-user-name">
                                    <p>Послуги</p>
                                </div>
                            </a>
                            <ul class="pgnav__list">
                                <li class="sidenav__item">
                                    <a href="../poslygi/poslygi-remont.php" class="sidenav__link">
                                        <span class="sidenav__text text-sm@md">Ремонт</span>
                                    </a>
                                    <a href="../poslygi/poslygi-poshitta.php" class="sidenav__link">
                                        <span class="sidenav__text text-sm@md">Пошиття</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- admin cabinet-->
    <main class="main">
        <div class="container">
            <div class="layout layout-sidebar">
                <main class="cabinet-content">
                    <form action="portfolio-create.php" method="post">
                        <p class="cabinet-title">Додавання публікації</p>
                        <ul class="photo-cards">
                            <li class="photo-cards-item">
                                <input accept=".jpg,.jpeg,.png" type="file" name="file[]" id="js-upload-photo" hidden>
                                <label for="js-upload-photo" class="button-link button-with-icon card-item">
                                    <img src="../../../images/image-icon.svg" alt="Add">
                                    Завантажити фото
                                </label>
                            </li>
                        </ul>
                        <div class="error-msg">
                            <?php include "../../database/errorInfo.php"; ?>
                        </div>
                        <ul class="cards-list" id="js-cards-list">
                        </ul>
                        <ul class="button-list">
                            <button name="add-card" type="submit" class="elem-link button-with-icon button-item">
                                <svg class="icon-svg bt-sv-icon" aria-hidden="true" viewBox="0 0 29 29">               
                                    <path style="opacity:.947" d="M22.231 5.806c1.073 -0.149 1.781 0.286 2.124 1.303 0.037 0.227 0.037 0.453 0 0.68l-3.058 14.16c-0.412 0.91 -1.12 1.297 -2.124 1.161a3.072 3.072 0 0 1 -0.51 -0.227A393.696 393.696 0 0 1 12.348 17.984c-0.458 -0.805 -0.346 -1.522 0.34 -2.152l1.218 -1.218a63.313 63.313 0 0 0 -3.058 1.756c-0.669 0.326 -1.104 0.128 -1.303 -0.594 0.039 -0.277 0.172 -0.494 0.396 -0.651a891.609 891.609 0 0 0 8.213 -4.871c0.55 -0.365 0.993 -0.261 1.332 0.312 0.042 0.213 0.023 0.42 -0.057 0.623A423.406 423.406 0 0 1 13.622 17.048a532.115 532.115 0 0 0 5.834 4.531c0.094 0.037 0.189 0.037 0.283 0a26.247 26.247 0 0 0 0.538 -2.181A842.848 842.848 0 0 1 22.854 7.42c-0.081 -0.082 -0.175 -0.1 -0.283 -0.057 -5.382 2.162 -10.763 4.323 -16.142 6.485a7.557 7.557 0 0 0 0.793 0.369c0.469 0.457 0.449 0.891 -0.057 1.303 -0.184 0.077 -0.372 0.097 -0.567 0.057 -0.434 -0.169 -0.868 -0.34 -1.303 -0.51 -0.849 -0.62 -0.963 -1.356 -0.34 -2.209a2.146 2.146 0 0 1 0.567 -0.34c5.587 -2.209 11.157 -4.447 16.709 -6.712Z"/>
                                </svg>
                                Зберегти
                            </button>
                        </ul>
                    </form>
                </main>
                <aside class="cabinet-sidebar">
                    <nav>
                        <div class="cabinet-user">
                            <a href="#" class="cabinet-nav-link cabinet-drop">
                                <div class="cabinet-nav-icon">
                                    <img src="../../../images/user-icon.svg" alt="User">
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
                                <a href="../users/users-index.php" class="cabinet-nav-link">
                                    <div class="cabinet-nav-icon">
                                        <img src="../../../images/users-icon.svg" alt="Users">
                                    </div>
                                    <div class="cabinet-user-name">
                                        <p>Користувачі</p>
                                    </div>
                                </a>
                            </li>
                            <li class="cb-nav-item">
                                <a href="portfolio-index.php?page=1" class="cabinet-nav-link nv-link-active">
                                    <div class="cabinet-nav-icon">
                                        <img src="../../../images/photo-icon.svg" alt="User">
                                    </div>
                                    <div class="cabinet-user-name">
                                        <p>Портфоліо</p>
                                    </div>
                                </a>
                            </li>
                            <li class="cb-nav-item">
                                <a href="#" class="cabinet-nav-link poslygi-drop">
                                    <div class="cabinet-nav-icon">
                                        <img src="../../../images/price-icon.svg" alt="User">
                                    </div>
                                    <div class="cabinet-user-name">
                                        <p>Послуги</p>
                                    </div>
                                </a>
                                <ul class="pgnav__list">
                                    <li class="sidenav__item">
                                        <a href="../poslygi/poslygi-remont.php" class="sidenav__link">
                                            <span class="sidenav__text text-sm@md">Ремонт</span>
                                        </a>
                                        <a href="../poslygi/poslygi-poshitta.php" class="sidenav__link">
                                            <span class="sidenav__text text-sm@md">Пошиття</span>
                                        </a>
                                    </li>
                                </ul>
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
                            <img src="../../../images/footer_logo.svg" alt="Atelier">
                    </div>
                    <div class="footer__social">
                        <div class="f__social__element">
                            <a href="https://www.instagram.com/atelie_achtyrka/" target="_blank">
                                <img src="../../../images/instagram_icon.svg" alt="Instagram">
                            </a>
                        </div>
                        <div class="f__social__element">
                            <a href="https://www.facebook.com/profile.php?id=100034953752105" target="_blank">
                                <img src="../../../images/facebook_icon.svg" alt="Facebook">
                            </a>
                        </div>
                        <!--
                        <div class="f__social__element">
                            <a href="" target="_blank">
                                <img src="assets/images/massenger_icon.svg" alt="Massenger">
                            </a>
                        </div>
                        -->
                    </div>
                    <div class="footer__text">
                        <h2>
                        © Atelier<br>
                        <br>
                        095 541 05 04<br>
                        Консультації та приймання замовлень<br>
                        Охтирка, вул. Універмаг, 2Б
                        </h2>
                    </div>
                </div>
                <div class="footer__sec">
                    <div class="f-sec-title">Про нас</div>
                    <div class="f-sec-elements">
                        <ul>
                            <li>
                                <a href="#" class="f-sec-elem">Про нас</a>
                            </li>
                            <li>
                                <a href="#" class="f-sec-elem">Контакти</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer__sec">
                    <div class="f-sec-title">Інформація</div>
                    <div class="f-sec-elements">
                        <ul>
                            <li>
                                <a href="#" class="f-sec-elem" >Ціни</a>
                            </li>
                            <li>
                                <a href="#" class="f-sec-elem" >Огляди</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer__sec">
                    <div class="f-sec-title">Блог</div>
                    <div class="f-sec-elements">
                        <ul>
                            <li>
                                <a href="#" class="f-sec-elem" >Курси</a>
                            </li>
                            <li>
                                <a href="#" class="f-sec-elem" >Працювати</a>
                            </li>
                            <li>
                                <a href="#" class="f-sec-elem">Про ремонт</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../../../js/app.js"></script>
</body>
</html>