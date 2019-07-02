<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
if (!empty($_COOKIE['CITY'])) {
    $arResult['IPROPERTY_VALUES']['SECTION_META_TITLE'] = str_replace(
        '#CITY#',
    $_COOKIE['CITY'],
        $arResult['IPROPERTY_VALUES']['SECTION_META_TITLE']
    );
}

if (!$arResult['NAME']) {
    $res = CIBlock::GetByID( $arResult['IBLOCK_ID']);
    if ($ar_res = $res->GetNext()){
        $arResult['NAME'] = $ar_res['NAME'];
    }
}