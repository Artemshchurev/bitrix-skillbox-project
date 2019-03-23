<?
define('SKILLBOX_SKIP_BREADCRUMPS', true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Skillbox");
?>
<?
$APPLICATION->IncludeComponent(
    'artem.skillbox:main_page.slider',
    '',
    Array(
        'IBLOCK_ID' => 8
    )
);

$APPLICATION->IncludeComponent(
        'artem.skillbox:bysteps.preview',
        '',
        Array(
            'IBLOCK_ID' => 7
        )
);
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>