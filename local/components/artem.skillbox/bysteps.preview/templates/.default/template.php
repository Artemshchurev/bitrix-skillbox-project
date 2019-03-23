<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if($arResult['ITEMS']):?>
<div class="works-block">
    <div class="container">
        <?foreach ($arResult['ITEMS'] as $id => $arData){?>
            <div class="work-item item-<?=$arData['CODE']?>">
            <p><?=$arData['NAME']?></p>
            <span><?=$arData['PREVIEW_TEXT']?></span>
        </div>
        <?}?>
    </div>
</div>
<?endif;?>