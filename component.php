<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

use Bitrix\Main\Loader;
use Bitrix\Sale\Location\Admin\LocationHelper as Helper;

if(!Loader::includeModule('sale')) {
		ShowError("SALE_MODULE_NOT_INSTALLED");
		return;
};
$arResult["user_location"] = false;
$arResult["location_name"] = "Select location";

$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
$user_location = $request->getCookieRaw("user_location");
if ($user_location) $arResult["user_location"] = $user_location;

$listParams = Helper::proxyListRequest('list');
$listParams['filter'] = ['=PARENT_ID' => 1];
$res = Helper::getList($listParams, false);
while( $data = $res->fetch()) {
	if ($data["ID"] == $arResult["user_location"]) {
		$arResult["location_name"] = $data["NAME_RU"];
	}
	$arResult["items"][] = $data;
};

$this->includeComponentTemplate();