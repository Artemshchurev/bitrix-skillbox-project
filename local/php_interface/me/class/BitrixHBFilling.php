<?php
/**
 * Created by PhpStorm.
 * User: artemshchurev
 * Date: 23.09.2018
 * Time: 13:20
 */

use Bitrix\Highloadblock as HB;
use Bitrix\Main\Entity;

class BitrixHBFilling
{
    public static function fillHighLoadBlock($hb_ID, $data)
    {
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('highloadblock');

        $hlblock = HB\HighloadBlockTable::getById($hb_ID)->fetch();
        $entity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
        $entityClass = $entity->getDataClass();

        foreach ($data as $item){
            $result = $entityClass::add(array(
                'UF_NAME' => (string) $item->attributes()->VALUE
            ));
            if (!$result->isSuccess()) {
                $errors = $result->getErrorMessages();
                echo $errors;
            } else {
                $id = $result->getId();
                echo 'Добавлены элементы в HB('.BLRD_HB_SYKNO_ID.') с id  '.$id.'<br>';
            }
        }
    }
}