<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?php //pre($arResult) ?>

<section class="catalog-list">
    <h1><?= $arResult['NAME'];?></h1>

    <form action="#" class="form-sort">
        <label>Сортировать по</label>
        <select class="sort js_sort_event">
            <? foreach ($arParams['SORT_AVAILABLE'] as $code => $name): ?>
                <option
                    value="<?=$APPLICATION->GetCurPageParam("SORT_BY=" . $code, ['SORT_BY'])?>"
                    <?=$code===$arParams['SORT_NOW']?"selected":""?>><?=$name?></option>
            <?endforeach;?>
        </select>

        <label>Показать</label>
        <select class="sort js_quantity_event">
            <?foreach ($arParams['PRODUCTS_QTY'] as $quantity):?>
                <option
                    value="<?=$APPLICATION->GetCurPageParam("PRODUCT_QTY=" . $quantity, ['PRODUCT_QTY'])?>"
                    <?=$arParams['PAGE_ELEMENT_COUNT']==$quantity?"selected":""?>><?=$quantity?> на странице</option>
            <?endforeach;?>
        </select>
    </form>

    <?php
    $i = 0;
    foreach ($arResult['ITEMS'] as $item): ?>
        <article class="product-item <?= $i % 3 === 1 ? "odd" : "" ?>" itemscope itemtype="http://schema.org/Product">
            <div class="attr discount"></div>
            <div class="image-block">
                <a href="<?= $item['DETAIL_PAGE_URL']; ?>">
                    <img src="<?= $item['PREVIEW_PICTURE']['SRC']; ?>" alt="" itemprop="image">
                </a>
            </div>
            <div class="product-block">
                <div class="product-info">
                    <?=$arResult['SECTION_PAGE_URL']?"<a href=\"{$arResult['SECTION_PAGE_URL']}\">{$arResult['NAME']}</a>":""?>
                    <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
                </div>
                <div class="product-name">
                    <a href="<?= $item['DETAIL_PAGE_URL']; ?>" itemprop="name"><?= $item['NAME']; ?></a>
                </div>
                <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <?= $item['MIN_PRICE']['PRINT_VALUE']; ?>
                    <meta itemprop="price" content="<?= $item['MIN_PRICE']['VALUE']; ?>">
                    <meta itemprop="priceCurrency" content="<?= $item['MIN_PRICE']['CURRENCY']; ?>">
                </div>
                <meta itemprop="description" content="Обязательно указывайте описание товара">
                <form action="<?=$item['OFFERS'][0]['ADD_URL']?>?>" class="product-add" method="post">
                    <input type="submit" class="small" value="В корзину">
                    <span class="ui-favorites">В избранное</span>
                </form>
            </div>
        </article>
    <?php $i++; ?>
    <?php endforeach; ?>
    <?=$arResult['NAV_STRING']?>
</section>