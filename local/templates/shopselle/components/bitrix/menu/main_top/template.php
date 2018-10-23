<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

    <nav itemscope itemtype="http://schema.org/SiteNavigationElement">
        <ul>
            <?
            foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>
                <?if($arItem["SELECTED"]):?>
                <li class="active"><a href="" itemprop="url"><?=$arItem["TEXT"]?></a></li>
            <?else:?>
                <li><a href="<?=$arItem["LINK"]?>" itemprop="url"><?=$arItem["TEXT"]?></a></li>
            <?endif?>

            <?endforeach?>
        </ul>
    </nav>
<?endif?>
