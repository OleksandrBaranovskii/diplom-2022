<?php
    include "../../database/path.php";
    include "../../controller/portfolio.php";
    include "../check-admin.php";

    $sth = $pdo->prepare("SELECT * FROM `cards` ORDER BY `id` DESC");
    $sth->execute();
    $items = $sth->fetchAll(PDO::FETCH_ASSOC);

    $sth = $pdo->prepare("SELECT id FROM `cards` WHERE status = 0");
    $sth->execute();
    $arcids = $sth->fetchAll(PDO::FETCH_ASSOC);
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
                    <p class="cabinet-title">Керування публікаціями</p>
                    <ul class="photo-cards">
                        <li class="photo-cards-item">
                            <a href="portfolio-create.php" class="a-link a-with-icon a-card-item">
                                <img src="../../../images/add-icon.svg" alt="Add">
                                Додати публікацію
                            </a>
                        </li>
                        <!--
                        <li class="photo-cards-item">
                            <a href="portfolio-index.php?publish=1&pub_all_ids=<?=$arcids['id'];?>" class="a-link a-with-icon a-card-item">
                                <svg class="icon-svg bt-el-icon" aria-hidden="true" viewBox="0 0 18 18">               
                                    <path d="M15.064 2.134c-.105.018-13.008 5.168-13.236 5.284a1.21 1.21 0 0 0-.475.534c-.077.211-.063.619.035.819.134.274.32.411.889.647.292.12.58.225.643.236.158.025.411-.105.513-.264.155-.229.081-.608-.141-.749-.042-.028-.204-.102-.359-.165s-.292-.127-.309-.141c-.014-.014 2.834-1.167 6.328-2.566 5.713-2.285 6.356-2.535 6.402-2.486.049.049-.06.594-1.097 5.442a592.465 592.465 0 0 1-1.185 5.481c-.042.105-.179.183-.267.148a410.39 410.39 0 0 1-4.556-3.526c-.014-.014.984-1.044 2.222-2.292 1.958-1.976 2.254-2.289 2.289-2.415.07-.264-.074-.573-.316-.671-.274-.112-.204-.151-3.691 1.912a651.382 651.382 0 0 0-3.34 1.986.773.773 0 0 0-.169.183c-.07.098-.081.155-.07.316.018.232.112.383.295.471.267.127.337.098 1.719-.717.696-.411 1.322-.78 1.389-.823l.123-.07-.141.155c-.077.084-.397.415-.707.735-.33.337-.601.647-.65.738-.056.112-.084.239-.095.443-.014.253-.004.309.081.496.049.116.158.274.239.352.26.246 4.746 3.674 4.911 3.748.127.06.232.074.527.077.334 0 .39-.011.587-.102.26-.12.541-.397.65-.64.039-.091.601-2.651 1.248-5.688 1.287-6.043 1.237-5.762 1.069-6.149a1.421 1.421 0 0 0-.629-.633 1.509 1.509 0 0 0-.728-.105z"/>
                                </svg>                              
                                Опублікувати все
                            </a>
                        </li>
                        -->
                    </ul>
                    <ul class="cards-list">
                        <?php foreach ($items as $row) {
                            $sth = $pdo->prepare("SELECT * FROM `cards_images` WHERE `card_id` = ? LIMIT 4");
                            $sth->execute(array($row['id']));
                            $image = $sth->fetchAll(PDO::FETCH_ASSOC); ?>
                            <details class="ls-card">
                                <summary class="card-header">
                                    <p class="card-title">Публікація #<?php echo $row['id'];?> 
                                        <?php if ($row['status'] == 1): ?>
                                            <p>Опублікована</p>
                                        <?php else: ?>
                                            <p>Архівована</p>
                                        <? endif ?>
                                    </p>
                                    <img src="../../../images/arrow-icon.svg" alt="arrow">
                                </summary>
                                <div class="card-body">
                                    <div class="cd-body-data">
                                        <div class="bd-data-photos">
                                            <?php if (!empty($image)): ?>
                                                <?php foreach($image as $img): ?>
                                                    <?php
                                                    $name = pathinfo($img['filename'], PATHINFO_FILENAME);
                                                    $ext = pathinfo($img['filename'], PATHINFO_EXTENSION);
                                                    ?>
                                                    <div class="bd-data-photo">
                                                        <img src="/uploads/<?php echo $name . '-thumb.' . $ext; ?>" alt="Photo">
                                                    </div>
                                                    <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="bd-data-elements">
                                            <p class="elem-title">Керування</p>
                                            <div class="elements-items">
                                                <?php if ($row['status']): ?>
                                                    <a style="text-decoration: none;" href="portfolio-index.php?publish=0&pub_id=<?=$row['id'];?>" 
                                                    class="elem-link button-with-icon elements-item">
                                                        <svg class="icon-svg bt-el-icon" aria-hidden="true" viewBox="0 0 18 18">               
                                                            <path d="M2.004 2.893a.549.549 0 0 0-.236.236c-.081.151-.081.165-.081 1.371s0 1.22.081 1.371c.127.239.306.316.717.316h.327v8.532l.081.151c.056.105.13.179.236.236l.151.081h11.44l.151-.081a.549.549 0 0 0 .236-.236l.081-.155-.007-3.516-.011-3.519-.084-.12c-.236-.33-.805-.323-.956.011-.063.137-.067.299-.067 3.315v3.176H3.937V6.187h11.907l.151-.081a.549.549 0 0 0 .236-.236c.081-.151.081-.165.081-1.371 0-1.202 0-1.22-.081-1.375a.514.514 0 0 0-.236-.236l-.155-.077H2.155l-.151.082zM15.187 4.5v.562H2.812V3.937h12.375v.562z"/><path d="M6.511 7.372a.66.66 0 0 0-.2.158c-.172.204-.084.629.165.809l.116.081h2.415c2.384 0 2.415 0 2.51-.074a.54.54 0 0 0 .246-.418.47.47 0 0 0-.063-.33c-.155-.302-.007-.285-2.7-.285-2.113 0-2.387.007-2.489.06z"/>
                                                        </svg>
                                                        Архівувати
                                                    </a>
                                                <?php else: ?>
                                                    <a style="text-decoration: none;" href="portfolio-index.php?publish=1&pub_id=<?=$row['id'];?>" 
                                                    class="elem-link button-with-icon elements-item">
                                                        <svg class="icon-svg bt-el-icon" aria-hidden="true" viewBox="0 0 18 18">               
                                                            <path d="M15.064 2.134c-.105.018-13.008 5.168-13.236 5.284a1.21 1.21 0 0 0-.475.534c-.077.211-.063.619.035.819.134.274.32.411.889.647.292.12.58.225.643.236.158.025.411-.105.513-.264.155-.229.081-.608-.141-.749-.042-.028-.204-.102-.359-.165s-.292-.127-.309-.141c-.014-.014 2.834-1.167 6.328-2.566 5.713-2.285 6.356-2.535 6.402-2.486.049.049-.06.594-1.097 5.442a592.465 592.465 0 0 1-1.185 5.481c-.042.105-.179.183-.267.148a410.39 410.39 0 0 1-4.556-3.526c-.014-.014.984-1.044 2.222-2.292 1.958-1.976 2.254-2.289 2.289-2.415.07-.264-.074-.573-.316-.671-.274-.112-.204-.151-3.691 1.912a651.382 651.382 0 0 0-3.34 1.986.773.773 0 0 0-.169.183c-.07.098-.081.155-.07.316.018.232.112.383.295.471.267.127.337.098 1.719-.717.696-.411 1.322-.78 1.389-.823l.123-.07-.141.155c-.077.084-.397.415-.707.735-.33.337-.601.647-.65.738-.056.112-.084.239-.095.443-.014.253-.004.309.081.496.049.116.158.274.239.352.26.246 4.746 3.674 4.911 3.748.127.06.232.074.527.077.334 0 .39-.011.587-.102.26-.12.541-.397.65-.64.039-.091.601-2.651 1.248-5.688 1.287-6.043 1.237-5.762 1.069-6.149a1.421 1.421 0 0 0-.629-.633 1.509 1.509 0 0 0-.728-.105z"/>
                                                        </svg>
                                                        Опублікувати
                                                    </a>
                                                <?php endif; ?>
                                                <a style="text-decoration: none;" href="portfolio-index.php?delete_card=<?=$row['id'];?>" 
                                                class="elem-link button-with-icon elements-item">
                                                    <svg class="icon-svg bt-el-icon" aria-hidden="true" viewBox="0 0 18 18">               
                                                        <path d="M6.521 1.744c-.32.165-.334.221-.334 1.297v.896H4.721c-1.329 0-1.48.007-1.589.063-.176.088-.26.221-.274.436a.589.589 0 0 0 .267.545l.12.081H8.99c5.231 0 5.759-.004 5.868-.056a.515.515 0 0 0 .285-.418.575.575 0 0 0-.186-.513l-.123-.12-1.512-.011-1.508-.011v-.896c0-.823-.007-.907-.07-1.034a.749.749 0 0 0-.183-.218l-.116-.081-2.408-.011c-2.134-.007-2.419 0-2.514.049zm4.166 1.631v.562H7.312V2.812h3.375v.562zM4.324 6.212a.616.616 0 0 0-.32.306c-.063.137-.067.32-.067 4.205 0 3.537.007 4.089.053 4.271a1.773 1.773 0 0 0 1.287 1.266c.337.077 7.109.077 7.446 0a1.772 1.772 0 0 0 1.107-.837c.239-.404.232-.243.232-4.721 0-4.025 0-4.036-.074-4.187a.54.54 0 0 0-.981-.011c-.07.134-.07.221-.07 4.177v4.039l-.081.151a.549.549 0 0 1-.236.236l-.151.081H9.006c-3.431 0-3.466 0-3.614-.074a.6.6 0 0 1-.232-.2l-.081-.13-.018-4.113-.018-4.113-.081-.116c-.141-.193-.443-.302-.64-.229z"/><path d="M7.615 7.393a.654.654 0 0 0-.211.2c-.074.12-.074.165-.074 2.531v2.408l.081.127c.2.323.731.323.946 0l.081-.12V7.71l-.081-.12c-.183-.274-.475-.352-.742-.197zm2.225 0a.877.877 0 0 0-.197.197l-.081.12v2.412c0 2.345.004 2.415.07 2.528.211.345.707.341.963-.004.074-.098.074-.12.074-2.514V7.717l-.084-.134c-.158-.257-.513-.348-.745-.19z"/>
                                                    </svg>
                                                    Видалити
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </details>
                        <?php } ?>
                    </ul>
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
                                <a href="portfolio-index.php" class="cabinet-nav-link nv-link-active">
                                    <div class="cabinet-nav-icon">
                                        <img src="../../../images/photo-icon.svg" alt="User">
                                    </div>
                                    <div class="cabinet-user-name">
                                        <p>Портфоліо</p>
                                    </div>
                                </a>
                            </li>
                            <li class="cb-nav-item">
                                <a href="#" class="cabinet-nav-link">
                                    <div class="cabinet-nav-icon">
                                        <img src="../../../images/price-icon.svg" alt="User">
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
                            <img src="../../../images/footer_logo.svg" alt="Atelier">
                        </a>
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
                        <div class="f__social__element">
                            <a href="" target="_blank">
                                <img src="../../../images/massenger_icon.svg" alt="Massenger">
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
    <script src="../../../js/app.js"></script>
</body>
</html>