<?
use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <? $APPLICATION->ShowHead(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1250">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic&subset=latin,cyrillic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/application.css">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<?
$_asset = Asset::getInstance();
$_asset->addCss(CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . '/css/application.css'));
$_asset->addJs(CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . '/js/application.min.js'));
?>
</head>
<body>
<div id="panel">
    <?
    $APPLICATION->ShowPanel();
    ?>
</div>
<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="main">

    <!--Header-->
    <header id="header" itemscope itemtype="http://schema.org/Organization">
        <div class="wrapper header-top">
            <div class="container">
                <nav>
                    <a href="#" class="button mini">Вход</a>
                    <a href="#" class="button mini gray">Регистрация</a>
                </nav>
                <div class="favorites popap-show">
                    <span>Избранное (3)</span>
                    <div class="popap-block">
                        <ul class="favorites-popap">
                            <li>
                                <div class="favorites-info">
                                    <div class="favorites-name">
                                        <a href="#">Tabletus sus 64GB</a>
                                    </div>
                                    <div class="favorites-price">
                                        30 000 руб.
                                    </div>
                                </div>
                                <div class="image-block mini" itemscope itemtype="http://schema.org/ImageObject">
                                    <a href="#">
                                        <img src="temp/product-1.png" alt="" itemprop="image">
                                    </a>
                                </div>
                                <div class="favorites-cart">
                                    <form action="#" method="post">
                                        <input type="hidden" name="product_id" value="1">
                                        <input type="hidden" name="count" value="1">
                                        <input type="submit" value="Добавить">
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="favorites-info">
                                    <div class="favorites-name">
                                        <a href="#">Monoblok Full HD 28</a>
                                    </div>
                                    <div class="favorites-price">
                                        30 000 руб.
                                    </div>
                                </div>
                                <div class="image-block mini" itemscope itemtype="http://schema.org/ImageObject">
                                    <a href="#">
                                        <img src="temp/product-2.png" alt="" itemprop="image">
                                    </a>
                                </div>
                                <div class="favorites-cart">
                                    <form action="#" method="post">
                                        <input type="hidden" name="product_id" value="1">
                                        <input type="hidden" name="count" value="1">
                                        <input type="submit" value="Добавить">
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="favorites-info">
                                    <div class="favorites-name">
                                        <a href="#">McBakus 17 500GB</a>
                                    </div>
                                    <div class="favorites-price">
                                        30 000 руб.
                                    </div>
                                </div>
                                <div class="image-block mini" itemscope itemtype="http://schema.org/ImageObject">
                                    <a href="#">
                                        <img src="temp/product-3.png" alt="" itemprop="image">
                                    </a>
                                </div>
                                <div class="favorites-cart">
                                    <form action="#" method="post">
                                        <input type="hidden" name="product_id" value="1">
                                        <input type="hidden" name="count" value="1">
                                        <input type="submit" value="Добавить">
                                    </form>
                                </div>
                            </li>
                            <li class="favorites-clear">
                                <form action="#" method="post">
                                    <input type="submit" class="gray small" value="Очистить список">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="user popap-show">
                    <a href="#">Профиль</a>
                    <div class="popap-block">
                        <form action="#" method="post" class="popap-form">
                            <div class="form-line">
                                <input type="text" placeholder="Логин или E-mail">
                            </div>
                            <div class="form-line">
                                <input type="password" placeholder="Пароль">
                            </div>
                            <div class="form-line">
                                <label for="check">
                                    <input type="checkbox" name="check" class="gray">
                                    Запомнить меня
                                </label>
                            </div>
                            <div class="form-line">
                                <input type="submit" class="button small" value="Вход">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="info">
                <span class="tel" itemprop="telephone">
                  8 (999) 000 00 00
                </span>
                    <span class="email" itemprop="email">
                  info@shopselle.com
                </span>
                </div>
            </div>
        </div>
        <div class="wrapper header-nav">
            <div class="container">
                <a href="/" class="logo" itemprop="url">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt="" itemprop="logo">
                    <meta itemprop="name" content="Shopselle">
                    <meta itemprop="address" content="Москва">
                </a>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "main_top",
                    Array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "mytop",
                        "USE_EXT" => "N"
                    )
                );?>

                <?$APPLICATION->IncludeComponent(
                    'artem.skillbox:geo_locator',
                    '',
                    Array(
                        'IBLOCK_ID' => 7
                    )
                );?>

                <?$APPLICATION->IncludeComponent(
                "bitrix:sale.basket.basket.line",
                "basket_link",
                array(
                    "COMPONENT_TEMPLATE" => "basket_link",
                    "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                    "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                    "SHOW_NUM_PRODUCTS" => "Y",
                    "SHOW_TOTAL_PRICE" => "N",
                    "SHOW_EMPTY_VALUES" => "Y",
                    "SHOW_PERSONAL_LINK" => "N",
                    "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                    "SHOW_AUTHOR" => "N",
                    "PATH_TO_REGISTER" => SITE_DIR."login/",
                    "PATH_TO_AUTHORIZE" => "",
                    "PATH_TO_PROFILE" => SITE_DIR."personal/",
                    "SHOW_PRODUCTS" => "N",
                    "POSITION_FIXED" => "N",
                    "HIDE_ON_BASKET_PAGES" => "Y"
                ),
                false
            );?>
                <!--пустая без active и a-->
                <!--<div class="cart-icon"></div>-->
            </div>
        </div>
        <div class="wrapper nav-block">
            <div class="container">
                <nav itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <ul>
                        <li>
                            <a href="#" itemprop="url">Моноблоки</a>
                        </li>
                        <li>
                            <a href="#" itemprop="url">Ноутбуки</a>
                            <img src="<?=SITE_TEMPLATE_PATH?>/temp/menu-top.png" alt="">
                        </li>
                        <li>
                            <a href="#" itemprop="url">Планшеты</a>
                        </li>
                        <li>
                            <a href="#" itemprop="url">Телефоны</a>
                            <img src="<?=SITE_TEMPLATE_PATH?>/temp/menu-new.png" alt="">
                        </li>
                        <li>
                            <a href="#" itemprop="url">Гаджеты</a>
                        </li>
                        <li>
                            <a href="#" itemprop="url">Аксессуары</a>
                        </li>
                    </ul>
                </nav>

                <form action="#" class="search" method="get">
                    <input type="text" placeholder="Поиск">
                    <input type="submit" value="Поиск">
                </form>
            </div>
        </div>
    </header>

    <div class="content <?= SKILLBOX_SKIP_BREADCRUMPS === true ? "home" : "" ?>">

        <? if (SKILLBOX_SHOW_PRODUCT_MAP === true): ?>
            <div class="wrapper title-block">
                <div class="container">
                    <h1 class="catalog">Карта товара</h1>

                    <ul class="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope
                            itemtype="http://schema.org/ListItem">
                            <a href="#" itemprop="item">
                                <span itemprop="name">Главная</span>
                            </a>
                            <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement" itemscope
                            itemtype="http://schema.org/ListItem">
                            <a href="#" itemprop="item">
                                <span itemprop="name">Магазин</span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                        <li itemprop="itemListElement" itemscope
                            itemtype="http://schema.org/ListItem">
                            <a href="#" itemprop="item">
                                <span itemprop="name">Ноутбуки</span>
                            </a>
                            <meta itemprop="position" content="3" />
                        </li>
                        <li itemprop="itemListElement" itemscope
                            itemtype="http://schema.org/ListItem">
                            <a href="#" itemprop="item">
                                <span itemprop="name">Карта товара</span>
                            </a>
                            <meta itemprop="position" content="4" />
                        </li>
                    </ul>
                </div>
            </div>
        <?endif;?>

        <!--Основной контент-->
        <main class="container">