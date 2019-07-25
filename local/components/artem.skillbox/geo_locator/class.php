<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader,
	Bitrix\Iblock;

class GeoLocator extends CBitrixComponent
{
	function onPrepareComponentParams($params)
	{
		if ($params['CACHE_TYPE'] == 'Y' || $params['CACHE_TYPE'] == 'A') {
			$params['CACHE_TIME'] = intval($params['CACHE_TIME']);
		} else {
			$params['CACHE_TIME'] = 0;
		}

		return $params;
	}

	public function executeComponent()
	{
//	    pre('Я запустился');
//        pre($this->arParams);
		try {
			if ($this->startResultCache(false)) {
				$this->checkModules();

				$this->prepareData();
				$this->doAction();

				$this->includeComponentTemplate();
			}
		} catch (Exception $e) {
			$this->AbortResultCache();
			$this->arResult['ERROR'] = $e->getMessage();
		}
	}

	protected function checkModules()
	{
		#подключаем нужные модули
		if (!Loader::includeModule('iblock'))
			throw new Exception('Модуль "Инфоблоки" не установлен');
	}

	protected function prepareData()
	{
		#проверки на существования
		$this->arResult['IBLOCK'] = [];
		if ($this->arParams['IBLOCK_ID']) {
			$this->arResult['IBLOCK'] = CIBlock::GetByID($this->arParams['IBLOCK_ID'])->Fetch();
		}
		if (!$this->arResult['IBLOCK']) {
			throw new Exception('Инфоблок не найден');
		}
	}

	protected function doAction()
	{
		$arSelect = ['ID', 'NAME', 'PROPERTY_BACKGROUND', 'PROPERTY_CONTENT'];
		$arFilter = ['IBLOCK_ID' => IntVal($this->arParams['IBLOCK_ID']), 'ACTIVE' => 'Y'];
		$res = CIBlockElement::GetList(['SORT' => 'ASC'], $arFilter, false, [], $arSelect);
		while($element = $res->Fetch()){
		    $this->arResult['ITEMS'][$element['ID']] = $element;
//		    print_r(CFile::GetPath($element['PROPERTY_BACKGROUND_VALUE']));
        }
//        pre($this->arResult, 1);
        $this->arResult['LOCATION'] = $this->getLocation();
	}

    private function getLocation(): array
    {
        $result = [];
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
                        $result = [
                            'city' => true,
                            'value' => $cityResult['UF_CITY_NAME'],
                        ];
                        if (empty($_COOKIE['CITY'])) {
                            setcookie('CITY', $cityResult['UF_CITY_NAME'], time() + 3600 * 24 * 31);
                        }
                    } else {
                        $result = [
                            'country' => true,
                            'value' => $cityResult['UF_CITY_NAME'],
                        ];
                    }
                } else {
                    $result = [
                        'country' => true,
                        'value' => $ipResult['UF_COUNTRY_ALIAS'],
                    ];
                }
            }
        }

        return $result;
    }
}