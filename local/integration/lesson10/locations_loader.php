<?php
$_SERVER["DOCUMENT_ROOT"] = "/home/c/cw36614/Skillbox/public_html";
set_time_limit(0);
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('sale');

const REGION_CODE = 3;
const CITY_CODE = 5;

$REGIONS = [];
$CITIES = [];
$i = 0;
if (($handle = fopen("data.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 0, ";")) !== false) {
        if ($i !== 0 && $data[4] && $data[7]) {
            $region = $data[4];
            $region_id = null;
            if (!in_array($region, $REGIONS)) {
                // Добавляем регион, если его нет в базе
                $region_res = \Bitrix\Sale\Location\LocationTable::add(array(
                    'CODE' => "region{$i}",
                    'TYPE_ID' => REGION_CODE,
                    'NAME' => array(
                        'ru' => array(
                            'NAME' => $region
                        ),
                    ),
                ));
                if ($region_res->isSuccess()) {
                    $region_id = $region_res->getId();
                    $REGIONS[$region_id] = $region;
                    $CITIES[$region_id] = [];
                } else {
                    print_r($region_res->getErrorMessages());
                }
            } else {
                // Добавляем города
                $city = $data[7];
                if (!$region_id) {
                    $region_id = array_search($region, $REGIONS);
                }
                if (!in_array($city, $CITIES[$region_id])) {
                    $city_res = \Bitrix\Sale\Location\LocationTable::add(array(
                        'CODE' => "city{$i}",
                        'PARENT_ID' => $region_id,
                        'TYPE_ID' => CITY_CODE,
                        'NAME' => array(
                            'ru' => array(
                                'NAME' => $city
                            ),
                        )
                    ));
                    if($city_res->isSuccess())
                    {
                        $city_id = $city_res->getId();
                        $CITIES[$region_id][] = $city;
                    } else {
                        print_r($city_res->getErrorMessages());
                    }
                }
            }
        }
        ++$i;
    }
    fclose($handle);
}
echo 'Последняя отработанная строка ' . $i;
