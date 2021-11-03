<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

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

//
$this->SetViewTarget('description_ex');

if (!empty($arResult['MENU'])) {
	?>
	<div class="b-title-subnav__wrapper">
		<div class="b-title-subnav__viewed-list js-title-subnav-list">
			<?
			foreach ($arResult['MENU'] as $arSection) {
				?>
				<a class="b-title-subnav__item js-title-subnav-item<? echo $arSection['ID'] == $arResult['SECTION']['ID'] ? ' is-active' : ''; ?>" href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a>
				<?
			}
			?>
			<div class="b-title-subnav__item b-title-nav-more js-title-subnav-more">
				<div class="b-title-nav-more__btn-more">
					<div class="b-title-nav-more__btn-more-inner"></div>
				</div>
				<div class="b-title-nav-more__container">
					<div class="b-title-nav-more__list js-title-subnav-more-list"><a class="b-title-nav-more__item" href="/"></a></div>
				</div>
			</div>
		</div>
	</div>
	<?
}

$this->EndViewTarget();
