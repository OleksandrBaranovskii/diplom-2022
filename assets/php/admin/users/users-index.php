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
                    <p class="cabinet-title">Керування користувачами</p>
                    <ul class="photo-cards">
                        <li class="photo-cards-item">
                            <a href="users-create.php" class="a-link a-with-icon a-card-item">
                                <img src="../../../images/add-user-icon.svg" alt="Add">
                                Створити користувача
                            </a>
                        </li>
                    </ul>
                    <p class="cabinet-title">Список користувачів</p>
                    <div class="us-wrapper-mobile">
                        <div class="us-table-wrapper">
                            <table class="users-table" data-table-width="25%;25%;25%;25" width="100%">
                                <thead class="users-thead">
                                    <tr>
                                        <th class="users-th" width="25%">ID</th>
                                        <th class="users-th" width="25%">Логін</th>
                                        <th class="users-th" width="25%">Роль</th>
                                        <th class="users-th" width="25%">Керування</th>
                                    </tr>
                                </thead>
                                <tbody class="users-tbody">
                                    <?php foreach ($users as $key => $user): ?>
                                    <tr class="tbody-up">
                                        <td class="users-td" width="25%"><?=$user['id'];?></td>
                                        <td class="users-td" width="25%"><?=$user['login'];?></td>
                                        <?php if ($user['admin'] == 1): ?>
                                            <td class="users-td" width="25%">Admin</td>
                                            <?php else: ?>
                                                <td class="users-td" width="25%">User</td>
                                        <? endif ?>
                                        <td class="users-td" width="25%">
                                            <div class="td-elements">
                                                <a href="users-edit.php?edit_id=<?=$user['id'];?>">
                                                    <svg class="icon-svg bt-el-icon svg-btn" aria-hidden="true" viewBox="0 0 18 18">               
                                                        <path d="M12.199 1.712c-.098.018-1.941 1.825-2.025 1.986a.655.655 0 0 0-.011.461c.021.042.728.77 1.575 1.617l1.533 1.536-3.621 3.621-3.621 3.618-1.522.253c-.833.141-1.529.243-1.543.232-.014-.014.088-.707.225-1.543l.25-1.515 3.027-3.027c2.095-2.099 3.03-3.059 3.048-3.125.035-.151-.004-.408-.081-.51a.552.552 0 0 0-.454-.246l-.197-.018L5.604 8.23c-2.152 2.152-3.189 3.213-3.21 3.284a93.863 93.863 0 0 0-.376 2.169c-.38 2.289-.376 2.229-.151 2.45.218.218.155.225 2.461-.155 1.15-.19 2.137-.366 2.194-.39.06-.028 2.275-2.222 4.929-4.873 4.356-4.359 4.823-4.841 4.848-4.961.056-.316.081-.288-1.807-2.183-1.178-1.178-1.793-1.772-1.888-1.818a.576.576 0 0 0-.404-.042zm1.477 2.63 1.283 1.283-.45.446-.446.45-1.29-1.29-1.294-1.294.439-.439c.243-.243.446-.439.457-.439s.594.577 1.301 1.283z"></path>
                                                    </svg>
                                                </a>
                                                <a href="users-index.php?delete_id=<?=$user['id'];?>">
                                                    <svg class="icon-svg bt-el-icon svg-btn" aria-hidden="true" viewBox="0 0 18 18">               
                                                        <path d="M6.521 1.744c-.32.165-.334.221-.334 1.297v.896H4.721c-1.329 0-1.48.007-1.589.063-.176.088-.26.221-.274.436a.589.589 0 0 0 .267.545l.12.081H8.99c5.231 0 5.759-.004 5.868-.056a.515.515 0 0 0 .285-.418.575.575 0 0 0-.186-.513l-.123-.12-1.512-.011-1.508-.011v-.896c0-.823-.007-.907-.07-1.034a.749.749 0 0 0-.183-.218l-.116-.081-2.408-.011c-2.134-.007-2.419 0-2.514.049zm4.166 1.631v.562H7.312V2.812h3.375v.562zM4.324 6.212a.616.616 0 0 0-.32.306c-.063.137-.067.32-.067 4.205 0 3.537.007 4.089.053 4.271a1.773 1.773 0 0 0 1.287 1.266c.337.077 7.109.077 7.446 0a1.772 1.772 0 0 0 1.107-.837c.239-.404.232-.243.232-4.721 0-4.025 0-4.036-.074-4.187a.54.54 0 0 0-.981-.011c-.07.134-.07.221-.07 4.177v4.039l-.081.151a.549.549 0 0 1-.236.236l-.151.081H9.006c-3.431 0-3.466 0-3.614-.074a.6.6 0 0 1-.232-.2l-.081-.13-.018-4.113-.018-4.113-.081-.116c-.141-.193-.443-.302-.64-.229z"></path><path d="M7.615 7.393a.654.654 0 0 0-.211.2c-.074.12-.074.165-.074 2.531v2.408l.081.127c.2.323.731.323.946 0l.081-.12V7.71l-.081-.12c-.183-.274-.475-.352-.742-.197zm2.225 0a.877.877 0 0 0-.197.197l-.081.12v2.412c0 2.345.004 2.415.07 2.528.211.345.707.341.963-.004.074-.098.074-.12.074-2.514V7.717l-.084-.134c-.158-.257-.513-.348-.745-.19z"></path>
                                                    </svg> 
                                                </a> 
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../../../js/app.js"></script>
</body>
</html>