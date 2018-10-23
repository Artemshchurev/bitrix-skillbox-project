<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$xml = simplexml_load_file("../integration/data/data.xml");
$random_product_number = rand(0, count($xml->product) - 1);
$product = $xml->product[$random_product_number];

$el = new CIBlockElement;

//Свойства
$props = [
//    'SYKNO' => $product->SYKNO->VARIANT,
//    'VIKRASKA' => $product->VIKRASKA
];

//Добавлние свойств в Highload Blocks
//BitrixHBFilling::fillHighLoadBlock(BLRD_HB_SYKNO_ID, $product->SYKNO->VARIANT);
//BitrixHBFilling::fillHighLoadBlock(BLRD_HB_VIKRASKA_ID, $product->VIKRASKA->VARIANT);

//Добавление фотографий
foreach ($product->IMAGES->OPTION as $img){
    $arImage = CFile::MakeFileArray((string)$img);
    if($arImage['type'] == 'unknown'){
        echo 'Некорректный путь до фото<br>';
    }else{
        $fid = CFile::SaveFile($arImage, 'billiard');
        if (intval($fid) > 0) $props['IMAGES'][] = intval($fid);
    }
}


$arFields = [
    'NAME' => (string)$product->NAME,
    'CODE' => (string)$product->CODE,
    'IBLOCK_SECTION_ID' => (string)$product->SECTION_ID,
    'DETAIL_TEXT' => (string)$product->DESCRIPTION,
    'IBLOCK_ID' => BLRD_INFOBLOCK_PRODUCT_ID,
    'PROPERTY_VALUES' => $props,
    'ACTIVE' => 'Y'
];

if($prodID = $el->Add($arFields)){
    pre('Добавлен товар с ID '. $prodID);
    $arFields = array(
        'ID' => $prodID,
        'QUANTITY' => 0
    );
    CCatalogProduct::Add($arFields);

    foreach ($product->OFFERS->OFFER as $offer){
        $propsOffer = array(
            'CML2_LINK' => $prodID,
            'SIZE_FIELD' => (string) $offer->SIZE_FIELD,
            'GAME_TYPE' => (string) $offer->GAME_TYPE,
            'TABLE_MATERIAL' => (string) $offer-> TABLE_MATERIAL,
            'TABLE_TYPE' => (string) $offer->TABLE_TYPE,
            'QTY_LEGS' => intval($offer->QTY_LEGS),
            'ART' => (string) $offer->ART
        );

        $arOfferFields = array(
            'NAME' => implode(
                ', ',
                [
                    (string)$product->NAME,
                    (string) $offer->SIZE_FIELD,
                    (string) $offer->GAME_TYPE,
                    (string) $offer-> TABLE_MATERIAL,
                    (string) $offer->TABLE_TYPE,
                    intval($offer->QTY_LEGS)
                ]
            ),
            'IBLOCK_ID' => BLRD_INFOBLOCK_OFFER_ID,
            'PROPERTY_VALUES' => $propsOffer,
            'ACTIVE' => 'Y'
        );

        if($offerId = $el->Add($arOfferFields)){
            pre('Добавлено предложение с ID '. $offerId);
            $arOfferFields = array(
                'ID' => $offerId,
                'QUANTITY' => 50,
                'WEIGHT' => intval($offer->VES)
            );
            CCatalogProduct::Add($arOfferFields);
            CPrice::Add(array(
                'PRODUCT_ID' => $offerId,
                'PRICE' => intval($offer->PRICE)
            ));
        }else{
            pre('Ошибка оффера');
        }
    }
}