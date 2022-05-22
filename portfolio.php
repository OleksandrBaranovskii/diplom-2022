<?php 
    include "assets/php/database/path.php";
    include "assets/php/controller/portfolio.php";
    
    $portfolio = selectAll('cards', ['status' => 1]);

    $page = isset($_GET['page']) ? $_GET['page']: 1;
    $limit = 8;
    $offset = $limit * ($page - 1);
    $total_pages = floor(count($portfolio) / $limit);
    
    $posts = selectAllFromCardsWithImagesOnIndex('cards', $limit, $offset);
    $pagLink = "<li class='pagination_item'>";  


    $sth = $pdo->prepare("SELECT * FROM `cards` WHERE status >= 1 ORDER BY `id` DESC;");
    $sth->execute();
    $items = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
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
    
    <title>Ательє з ремонту та пошиття одягу | ATELIER</title>
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
                            <a href="index.html" class="nav__link">Головна</a>
                        </li>
                        <li>
                            <a href="#" class="nav__link">Послуги</a>
                            <ul class="nav__sub-list">
                                <li>
                                    <a href="remont.php" class="nav__sub-link">Ремонт одягу</a>
                                </li>
                                <li>
                                    <a href="poshitta.php" class="nav__sub-link">Пошиття одягу</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="portfolio.php?page=1" class="nav__link">Портфоліо</a>
                        </li>
                        <!--
                        <li>
                            <a href="#" class="nav__link">Про нас</a>
                        </li>
                        -->
                        <li>
                            <a href="contacts.html" class="nav__link" style="padding: 0;">Контакти</a>
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
                <nav>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <a href="index.html" class="menu-link">Головна</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Послуги
                                <div class="item-arrow"></div>
                            </a>
                            <ul class="menu-item-list">
                                <li class="mi-li-item">
                                    <a href="remont.php" class="menu-link">
                                        Ремонт
                                    </a>
                                </li>
                                <li class="mi-li-item">
                                    <a href="poshitta.php" class="menu-link">
                                        Пошиття
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="portfolio.php?page=1" class="menu-link">Портфоліо</a>
                        </li>
                        <!--
                        <li>
                            <a href="#" class="nav__link">Про нас</a>
                        </li>
                        -->
                        <li class="menu-item">
                            <a href="contacts.html" class="menu-link">Контакти</a>
                        </li>
                        <li class="menu-item">
                            <a href="tel: +380955410504" class="menu-link">+38 095 541 05 04</a>
                        </li>
                    </ul>
                </nav>
            </div>
    
        </div>
    </header>
    <!-- end header -->


    <main class="main">
        <div class="container">
            <div class="works">
                <!--<div class="ws_rz-gr">
                    <div class="ws_razdel">
                        <a href="" class="rz_btn rz_active">Головна</a>
                        <a href="" class="rz_btn">Порівняння</a>
                        <a href="" class="rz_btn">Додані</a>
                    </div>
                    <div class="ws_grid">
                        <div>

                        </div>
                        <div>

                        </div>
                    </div>
                </div>-->
                <div class="ws_photos">
                    <ul class="photos_list">
                        <?php foreach ($posts as $row) {
                            $sth = $pdo->prepare("SELECT * FROM `cards_images` WHERE `card_id` = ? LIMIT 1");
                            $sth->execute(array($row['id']));
                            $image = $sth->fetchAll(PDO::FETCH_ASSOC); ?>
                            <li class="photos_item">
                                <?php if (!empty($image)): ?>
                                    <?php foreach($image as $img): ?>
                                        <?php
                                        $name = pathinfo($img['filename'], PATHINFO_FILENAME);
                                        $ext = pathinfo($img['filename'], PATHINFO_EXTENSION);
                                        ?>
                                        <a href="/uploads/<?php echo $name . '.' . $ext; ?>" class="photo-v1 glightbox" style="background-image: url(/uploads/<?php echo $name . '.' . $ext; ?>);">
                                            <div class="photo-v1_content">
                                                <div class="photo-v1_content-hover">
                                                    <div class="photo-v1_content-hover-filter">
                                                    </div>
                                                    <div class="photo-v1_content-btn">
                                                        <img src="assets/images/ph-search.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php include("assets/php/include/pagination.php"); ?>
            </div>
        </div>
    </main>


    <!-- footer -->
    <footer class="footer">
        <div class="footer__container">
            <div class="footer__elements">
                <div class="footer__main__sec">
                    <div class="footer__logo">
                            <img src="assets/images/footer_logo.svg" alt="Atelier">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

    <script>

        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true,
        });
        var lightboxVideo = GLightbox({
            selector: '.glightbox3',
            plyr: {
                css: 'https://cdn.plyr.io/3.5.6/plyr.css', // Default not required to include
                js: 'https://cdn.plyr.io/3.5.6/plyr.js', // Default not required to include
                config: {
                    ratio: '16:9', // or '4:3'
                    muted: false,
                    hideControls: true,
                    youtube: {
                        noCookie: true,
                        controls: 0,
                        rel: 0,
                        showinfo: 0,
                        iv_load_policy: 3
                    },
                    vimeo: {
                        byline: false,
                        portrait: false,
                        title: false,
                        speed: true,
                        transparent: false
                    }
                }
            },
        });

    </script>                 
    <script src="assets/js/app.js"></script>
</body>
</html>