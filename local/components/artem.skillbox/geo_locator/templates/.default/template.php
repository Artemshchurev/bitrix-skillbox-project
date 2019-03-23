<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (CModule::IncludeModule('highloadblock')) {
    $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(7)->fetch();
    $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
    $strEntityDataClass = $obEntity->getDataClass();

    $ipGeoBaseNumber = explode('.', $_SERVER['REMOTE_ADDR']);
    $ipGeoBaseNumber =
        intval($ipGeoBaseNumber[0]) * 256 * 256 * 256
        + intval($ipGeoBaseNumber[1]) * 256 * 256
        + intval($ipGeoBaseNumber[2]) * 256
        + intval($ipGeoBaseNumber[3]);

    $rsData = $strEntityDataClass::getList(array(
        "select" => array("UF_CITY_ID", "UF_COUNTRY_ALIAS"),
        "filter" => array(
            "<=UF_BEGIN_RANGE" => $ipGeoBaseNumber,
            ">=UF_END_RANGE" => $ipGeoBaseNumber,
        )
    ));
    $cityDetectionString = '';
    $ipResult = $rsData->Fetch();
    if ($ipResult) {
        if ($ipResult['UF_CITY_ID']) {
            $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(6)->fetch();
            $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
            $strEntityDataClass = $obEntity->getDataClass();

            $rsData = $strEntityDataClass::getList(array(
                "select" => array("UF_CITY_NAME"),
                "filter" => array(
                    "UF_CITY_ID" => $ipResult['UF_CITY_ID'],
                )
            ));

            $cityResult = $rsData->Fetch();
            if($cityResult) {
                $cityDetectionString = 'Ваша город: ' . $cityResult['UF_CITY_NAME'];
            } else {
                $cityDetectionString = 'Ваша страна ' . $ipResult['UF_COUNTRY_ALIAS'];
            }
        } else {
            $cityDetectionString = 'Ваша страна ' . $ipResult['UF_COUNTRY_ALIAS'];
        }
    }
}
?>
<div style="position:absolute; right: 200px; top: 8px;color: #1ac3e8;">
    <?= $cityDetectionString; ?>
</div>