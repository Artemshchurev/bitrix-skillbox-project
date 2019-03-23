<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if($arResult['ITEMS']):?>
<div class="home-slider-conteiner">
    <div class="home-slider">
    <?foreach ($arResult['ITEMS'] as $id => $arData){?>
        <div class="home-slider-item">
            <img src="<?=CFile::GetPath($arData['PROPERTY_BACKGROUND_VALUE'])?>" alt="" class="home-slider-bg">
            <div class="container">
                <a href="#">
                    <img src="<?=CFile::GetPath($arData['PROPERTY_CONTENT_VALUE'])?>" alt="" class="home-slider-content">
                </a>
            </div>
        </div>
    <?}?>
    </div>
</div>
<?endif;?>