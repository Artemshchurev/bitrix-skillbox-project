<?php

namespace Sale\Handlers\Delivery;

use Bitrix\Sale\Delivery\CalculationResult;
use Bitrix\Sale\Delivery\Services\Base;

class CustomHandler extends Base
{
    private const MOSCOW_REGION_CODE = 'region42';

    public static function getClassTitle()
    {
        return 'Моя служба доставки';
    }

    public static function getClassDescription()
    {
        return 'Моя служба доставки с моими правилами и ограничениями';
    }

    protected function calculateConcrete(\Bitrix\Sale\Shipment $shipment)
    {
        $result = new CalculationResult();
        $order = $shipment->getCollection()->getOrder();
        $orderPrice = floatval($order->getPrice());
        $props = $order->getPropertyCollection();
        $locationCode = $props->getDeliveryLocation()->getValue();

        // стоимость заказа более 5000 и город Москва
        if ($orderPrice > 5000 && $locationCode === self::MOSCOW_REGION_CODE) {
            $result->setDeliveryPrice(0);
        } else {
            $location = \Bitrix\Sale\Location\LocationTable::getByCode($locationCode, array(
                'select' => array('*', 'NAME_RU' => 'NAME.NAME')
            ))->fetch();
            if (mb_strlen($location['NAME_RU']) % 2 === 0) {
                $result->setDeliveryPrice(500);
            } else {
                $result->setDeliveryPrice(800);
            }
        }

        return $result;
    }

    protected function getConfigStructure()
    {
        return [];
    }

    public function isCalculatePriceImmediately()
    {
        return true;
    }

    public static function whetherAdminExtraServicesShow()
    {
        return true;
    }
}
