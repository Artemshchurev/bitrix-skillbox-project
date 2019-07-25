<?
/*
 * В данном файле только подключения. Никаких реализаций и функций
 * */

#---------------------------------------------------------------
#ОБЩИЕ ФАЙЛЫ, КОТОРЫЕ МОГУТ ХОДИТЬ У ВАС ОТ ПРОЕКТА К ПРОЕКТУ

#Подключаем автоподключение классов bitrix
require_once(__DIR__ . '/me/autoloadBxClass.php');

#свои мини функции в глобальном неймспейсе
require_once(__DIR__ . '/me/functions.php');

#класс для логгирования soap
require_once(__DIR__ . '/me/class/SoapClientLogging.php');

#класс для подключению к soap
require_once(__DIR__ . '/me/class/SoapConnect.php');

#Класс с заполнением HL блоков
require_once (__DIR__ . '/me/class/BitrixHBFilling.php');

#---------------------------------------------------------------
#ДАЛЕЕ ПОДКЛЮЧАЕМ ВСЕ, ЧТО ОТНОСИТСЯ К КОНКРЕТНО ЭТОМУ ПРОЕКТУ

# события каталога
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("CatalogEventHandler", "OnBeforeIBlockElementAddHandler"));

class CatalogEventHandler
{
    // Запрет наличия "Кактус" в названии
    function OnBeforeIBlockElementAddHandler(&$arFields) {
        if (stripos($arFields['NAME'], 'кактус') !== false) {
            global $APPLICATION;
            $APPLICATION->throwException("Кактус в названии недопустим");
            return false;
        }
    }
}
#констаны
require_once(__DIR__ . '/skillbox/constant.php');

#автоподключение классов Highload блоков
require_once(__DIR__ . '/skillbox/autoloadHighLoadIBlock.php');

#автоподключение классов проекта. Обычно такие пишут для облегчения повторяющихся операций
require_once(__DIR__ . '/skillbox/autoloadProjectClass.php');

$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('sale', 'onSaleDeliveryHandlersClassNamesBuildList', 'addCustomDeliveryServices');

function addCustomDeliveryServices(\Bitrix\Main\Event $event)
{
    $result = new \Bitrix\Main\EventResult(
        \Bitrix\Main\EventResult::SUCCESS,
        array(
            '\Sale\Handlers\Delivery\CustomHandler' => '/local/php_interface/include/sale_delivery/custom/handler.php'
        )
    );

    return $result;
}

function launchMakeOrderPageEvent()
{
    CEvent::Send("MAKE_ORDER_PAGE_EVENT", 's1', array(
        'RANDOM_STR' => substr(md5(time()), 0, 6),
        'TIME_RUN' => date('H:i:s d-m-Y'),
    ));

    return "launchMakeOrderPageEvent();";
}