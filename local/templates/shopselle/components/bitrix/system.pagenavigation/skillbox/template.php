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
//pre($arResult, 1);
if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
<section class="pagination-block">
    <?if ($arResult["NavPageNomer"] > 1):?>
        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1" class="key">Предыдущая</a>
    <?endif?>

    <div class="pagination-page">
        <?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <a class="key active"><?=$arResult["nStartPage"]?></a>
            <?else:?>
                <a class="key" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
            <?endif?>
            <?$arResult["nStartPage"]++?>
        <?endwhile?>
    </div>

    <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="key">Следующая</a>
    <?endif?>

    <span class="pagination-text">
        Показано <?=$arResult["NavFirstRecordShow"]?>-<?=$arResult["NavLastRecordShow"]?> из <?=$arResult["NavRecordCount"]?> результатов
    </span>
</section>
