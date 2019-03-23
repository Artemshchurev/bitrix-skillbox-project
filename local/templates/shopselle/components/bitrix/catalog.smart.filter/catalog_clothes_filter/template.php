<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
//pre($arResult);
?>

<aside class="catalog-filter">
    <form name="<?=$arResult["FILTER_NAME"]."_form"?>" action="<?=$arResult["FORM_ACTION"]?>" method="get">
        <div class="aside-nav">
            <ul>
                <li class="sub-menu active">
                    <a href="#">Моноблоки</a>

                    <div class="sub-menu-block">
                        <span>Изготовитель</span>
                        <ul>
                            <li><a href="#">Aser <span>240</span></a></li>
                            <li><a href="#">Asus <span>70</span></a></li>
                            <li><a href="#">Apple <span>2670</span></a></li>
                            <li><a href="#">Dellete <span>240</span></a></li>
                            <li><a href="#">XP <span>240</span></a></li>
                            <li><a href="#">Lenovo <span>240</span></a></li>
                        </ul>
                        <a href="#">Показать все</a>
                    </div>
                </li>
                <li><a href="#">Ноутбуки</a></li>
                <li><a href="#">Планшеты</a></li>
                <li><a href="#">Телефоны</a></li>
                <li><a href="#">Гаджеты</a></li>
                <li><a href="#">Аксессуары</a></li>
            </ul>
        </div>
        <div class="aside-block">
            <h1>Фильтр по цене</h1>
            <div class="price-range">
                <div id="range"></div>
                <input type="text" name="min-price" id="min-price" value="100" data-min="100">
                <input type="text" name="max-price" id="max-price" value="3000" data-max="3000">

                <div class="info">
                    <p>Выбранный диапозон:</p>
                    <div class="info-price">
                        ЦЕНА:
                        <span class="min-price"><span>---</span> р.</span> - <span class="max-price"><span>---</span> р.</span>
                        <span class="ui-delete"> </span>
                    </div>
                </div>
                <input type="submit" value="Фильтрация" class="small">
            </div>

        </div>
        <div class="aside-block">
            <h1>Фильтр по бренду</h1>
            <div class="aside-line">
                <label for="check">
                    <input type="checkbox">
                    Asus
                    <span>240</span>
                </label>
            </div>
            <div class="aside-line">
                <label for="check">
                    <input type="checkbox">
                    Asus
                    <span>70</span>
                </label>
            </div>
            <div class="aside-line">
                <label for="check">
                    <input type="checkbox">
                    Asus
                    <span>2670</span>
                </label>
            </div>
            <div class="aside-line">
                <label for="check">
                    <input type="checkbox">
                    Asus
                    <span>42</span>
                </label>
            </div>
            <div class="aside-line">
                <label for="check">
                    <input type="checkbox">
                    Asus
                    <span>5</span>
                </label>
            </div>
            <div class="aside-line">
                <label for="check">
                    <input type="checkbox">
                    Asus
                    <span>17</span>
                </label>
            </div>
        </div>
    </form>
</aside>
