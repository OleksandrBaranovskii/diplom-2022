<?php
    include "../../database/path.php";
    include "../../controller/users.php";
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
    
    <title>Ательє з ремонту та пошиття одягу | ATELIER</title>
</head>
<body>
    <!-- header -->
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
                            <a href="users-index.php" class="cabinet-nav-link  nv-link-active">
                                <div class="cabinet-nav-icon">
                                    <img src="../../../images/users-icon.svg" alt="Users">
                                </div>
                                <div class="cabinet-user-name">
                                    <p>Користувачі</p>
                                </div>
                            </a>
                        </li>
                        <li class="cb-nav-item">
                            <a href="../portfolio/portfolio-index.php?page=1" class="cabinet-nav-link">
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
                    <form class="rg-form" method="post" action="users-edit.php">
                        <h2 class="lg-form-tl">Редагування користувача</h2>
                        <div class="lg-form-msg">
                            <?php include "../../database/errorInfo.php"; ?>
                        </div>
                        <div class="lg-form-items">
                            <input name="id" value="<?=$id?>" type="hidden">
                            <div class="lg-form-item">
                                <input name="login" readonly value="<?=$login?>" type="text" id="formLogin" placeholder="Введіть логін" class="lg-form-inp">
                            </div>
                            <div class="lg-form-item">
                                <input name="password" type="password" id="formPass" placeholder="Введіть новий пароль" class="lg-form-inp">
                                <div class="rg-checkbox">
                                    <input id="formAgreement" value="1" type="checkbox" name="admin" class="rg-checkbox-input">
                                    <label for="formAgreement" class="rg-checkbox-label">
                                        <span>Admin</span>
                                    </label>
                                </div>
                            </div>
                            <div class="lg-form-item">
                                <button type="submit" class="lg-form-btn" name="update-user">Збрегти</button>
                            </div>
                        </div>
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
                                <a href="users-index.php" class="cabinet-nav-link nv-link-active ">
                                    <div class="cabinet-nav-icon">
                                        <img src="../../../images/users-icon.svg" alt="User">
                                    </div>
                                    <div class="cabinet-user-name">
                                        <p>Користувачі</p>
                                    </div>
                                </a>
                            </li>
                            <li class="cb-nav-item">
                                <a href="../portfolio/portfolio-index.php?page=1" class="cabinet-nav-link">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../../js/app.js"></script>
</body>
</html>