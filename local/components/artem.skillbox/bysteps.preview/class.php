<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader,
	Bitrix\Iblock;

class ByStepsPreview extends CBitrixComponent
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
		$arSelect = ['ID', 'NAME', 'PREVIEW_TEXT', 'CODE'];
		$arFilter = ['IBLOCK_ID' => IntVal($this->arParams['IBLOCK_ID']), 'ACTIVE' => 'Y'];
		$res = CIBlockElement::GetList(['SORT' => 'ASC'], $arFilter, false, [], $arSelect);
		while($element = $res->Fetch()){
		    $this->arResult['ITEMS'][$element['ID']] = $element;
        }
//        pre($this->arResult, 1);
	}


}