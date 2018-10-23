<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>

<div class="cart-icon active">
    <a href="<?= $arParams['PATH_TO_BASKET'] ?>"><span><? if($arResult['NUM_PRODUCTS']>0):?>+<?endif;?><?=$arResult['NUM_PRODUCTS']?></span></a>
</div>