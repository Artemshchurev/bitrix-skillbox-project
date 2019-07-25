<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;



?>
<?php if (isset($arResult['LOCATION'])): ?>
    <?php $location = $arResult['LOCATION']; ?>
    <?php if ($location && isset($location['value']) && (isset($location['city']) || isset($location['country']))): ?>
        <div style="position:absolute; right: 200px; top: 8px;color: #1ac3e8;">
            <?= Loc::getMessage(
                isset($location['city'])
                    ? 'COMPONENT_GEO_LOCATION_YOUR_CITY'
                    : 'COMPONENT_GEO_LOCATION_YOUR_COUNTRY'); ?>: <?= $location['value']; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
