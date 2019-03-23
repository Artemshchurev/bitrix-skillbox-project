<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<div class="bx-auth-profile" style="margin-top: 60px;">

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
    <? if($arParams["SET_TITLE"] == "Y"): ?>
        <h1><?=GetMessage("PROFILE_DEFAULT_TITLE")?></h1>
    <? endif; ?>

<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
    <?=$arResult["BX_SESSION_CHECK"]?>
    <input type="hidden" name="lang" value="<?=LANG?>" />
    <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

    <div class="input-group">
        <label for="NAME"><?=GetMessage('NAME')?></label>
        <input type="text" class="form-control" id="NAME" name="NAME" value="<?=$arResult["arUser"]["NAME"]?>">
    </div>

    <div class="input-group">
        <label for="LAST_NAME"><?=GetMessage('LAST_NAME')?></label>
        <input type="text" class="form-control" id="LAST_NAME" name="LAST_NAME" value="<?=$arResult["arUser"]["LAST_NAME"]?>">
    </div>

    <div class="input-group">
        <label for="SECOND_NAME"><?=GetMessage('SECOND_NAME')?></label>
        <input type="text" class="form-control" id="SECOND_NAME" name="SECOND_NAME" value="<?=$arResult["arUser"]["SECOND_NAME"]?>">
    </div>

	<p><input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">&nbsp;&nbsp;<input type="reset" value="<?=GetMessage('MAIN_RESET');?>"></p>
</form>
</div>