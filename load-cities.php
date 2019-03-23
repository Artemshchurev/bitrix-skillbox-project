<?php
ini_set('max_execution_time', 0);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (CModule::IncludeModule('highloadblock'))
{
    $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(6)->fetch();
    $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
    $strEntityDataClass = $obEntity->getDataClass();
    $handle = @fopen(__DIR__ . '/scripts/cities.txt', "r");
    $i = 0;
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $data = preg_split('/\t/', mb_convert_encoding($line, "UTF-8", "windows-1251"));

            $arElement = Array(
                "UF_CITY_ID" => $data[0],
                "UF_CITY_NAME" => $data[1],
                "UF_COUNTRY_NAME" => $data[3],
            );

            $obResult = $strEntityDataClass::add($arElement);
            $bSuccess = $obResult->isSuccess();

            $i++;
        }
        fclose($handle);
    }
    var_dump($i);
}
