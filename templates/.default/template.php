<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<dev id="locselect-Btn">
	<div class="locselect-pin"></div>
	<span><?=$arResult["location_name"]?></span>
</div>

<div id="locselect-Modal" class="locselect-modal">
<div class="locselect-modal-content">
  <span class="locselect-close">&times;</span>
  	<div class="grid-container">
		<?
		foreach($arResult["items"] as $item){?>
			<div class="locselect-item">
				<span data-loc="<?=$item['ID']?>">
					<?=$item['NAME_RU']?>
				</span>
			</div>
		<?} //foreach?>
		
	</div>
</div>

</div>

