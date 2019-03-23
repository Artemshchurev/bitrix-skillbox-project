<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Test");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.location.selector.search",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CODE" => "",
		"FILTER_BY_SITE" => "N",
		"ID" => "",
		"INITIALIZE_BY_GLOBAL_EVENT" => "",
		"INPUT_NAME" => "LOCATION",
		"JS_CALLBACK" => "",
		"JS_CONTROL_GLOBAL_ID" => "",
		"PROVIDE_LINK_BY" => "id",
		"SHOW_DEFAULT_LOCATIONS" => "N",
		"SUPPRESS_ERRORS" => "N"
	)
);?><br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>