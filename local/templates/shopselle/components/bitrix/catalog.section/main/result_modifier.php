<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
// ГОРОД
if (!empty($_COOKIE['CITY'])) {
    $arResult['IPROPERTY_VALUES']['SECTION_META_TITLE'] = str_replace(
        '#CITY#',
    $_COOKIE['CITY'],
        $arResult['IPROPERTY_VALUES']['SECTION_META_TITLE']
    );
}
// КОЛИЧЕСТВО
$arFilter = ["IBLOCK_ID" => 2, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => "Y"];
if ($arResult['ORIGINAL_PARAMETERS']['SECTION_CODE']) {
    $arFilter['SECTION_CODE'] = $arResult['ORIGINAL_PARAMETERS']['SECTION_CODE'];
}
$goodsCount = CIBlockElement::GetList(
    Array(),
    $arFilter,
    [],
    false,
    ["ID", "IBLOCK_ID",]
);
$arResult['IPROPERTY_VALUES']['SECTION_META_TITLE'] = str_replace(
    '#QUANTITY#',
    $goodsCount,
    $arResult['IPROPERTY_VALUES']['SECTION_META_TITLE']
);
// МИН МАКС ЦЕНЫ
$prices = [];
foreach ($arResult['ITEMS'] as $item) {
    $prices[] = $item['MIN_PRICE']['VALUE'];
}
$arResult['IPROPERTY_VALUES']['SECTION_META_TITLE'] = str_replace(
    '#MIN#',
    min($prices),
    $arResult['IPROPERTY_VALUES']['SECTION_META_TITLE']
);
$arResult['IPROPERTY_VALUES']['SECTION_META_TITLE'] = str_replace(
    '#MAX#',
    max($prices),
    $arResult['IPROPERTY_VALUES']['SECTION_META_TITLE']
);
if (!$arResult['NAME']) {
    $res = CIBlock::GetByID( $arResult['IBLOCK_ID']);
    if ($ar_res = $res->GetNext()){
        $arResult['NAME'] = $ar_res['NAME'];
    }
}