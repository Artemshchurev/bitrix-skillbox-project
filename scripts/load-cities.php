<?php

var_dump('dwdw');

function getCity()
{
//        ini_set('max_execution_time', 0);
    $formattedIpAddress = explode('.', $_SERVER['REMOTE_ADDR']);
    $formattedIpAddress =
        (int) $formattedIpAddress[0] * 256 * 256 * 256 +
        (int) $formattedIpAddress[1] * 256 * 256 +
        (int) $formattedIpAddress[2] * 256 +
        (int) $formattedIpAddress[3];

    $handle = @fopen(__DIR__ . '/cidr_optim.txt', "r");

    $cityId = null;
    $countryAlias = null;
    $i = 1;
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            // process the line read.
            $data = preg_split('/\s+/', $line);
            if ($formattedIpAddress >= (int)$data[0] && $formattedIpAddress <= (int)$data[1]) {
                $cityId = $data[6];
                $countryAlias = $data[5];
            }
            $i++;
        }
        fclose($handle);
    }
    // Последняя строка
    var_dump($i - 1);

    if ($cityId === null) {
        return 'Город неизвестен';
    } else if ($cityId == '-') {
        return 'Страна ' . $countryAlias;
    } else {
        $cities = file_get_contents(__DIR__ . '/cities.txt');
        $cities = explode("\n", $cities);
        foreach ($cities as $city) {
            $city = preg_split('/\s+/', $city);
            if ($city[0] == $cityId) {
                return $city[1];
            }
        }
    }
}