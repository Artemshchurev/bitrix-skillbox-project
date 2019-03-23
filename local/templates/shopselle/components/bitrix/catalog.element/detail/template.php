<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */
?>

<section class="product-page" itemscope itemtype="http://schema.org/Product">
<?//pre($arResult);?>

              <div class="image-block-list">

                <div class="attr discount"></div>

                <ul class="gallery">
                    <?foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $id):?>
                        <li data-thumb="<?=CFile::GetPath($id);?>">
                            <img src="<?=CFile::GetPath($id);?>" itemprop="image">
                        </li>
                    <?endforeach;?>
                </ul>
              </div>
              <div class="product-info-block">
                <div class="product-category">
                  <a href="<?=$arResult['SECTION']['SECTION_PAGE_URL']?>"><?=$arResult['SECTION']['NAME']?></a>
                </div>
                <div class="product-name">
                  <a href="#" itemprop="name"><?=$arResult['NAME']?></a>
                </div>
                <div class="product-info">
                  <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
                  <a href="#tab-3" class="review">4 отзыва</a>

                  <div class="availability">
                      Наличие:
                    <span>Есть</span>
                    <!-- Нет -->
                  </div>
                </div>
                <div class="product-favorites">
                  <span class="ui-favorites" data-productid="1">В избранное</span>
                  <span class="ui-share-mail" data-productid="1">Отправить другу</span>
                </div>
                <div class="product-description" itemprop="description">
                  <p>
                    <?=$arResult['DETAIL_TEXT'];?>
                  </p>
                </div>
                <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <?=$arResult['OFFERS'][0]['MIN_PRICE']['PRINT_DISCOUNT_VALUE_NOVAT'];?>
                  <meta itemprop="price" content="49 0000">
                  <meta itemprop="priceCurrency" content="RUB">
                </div>

                <form action="<?=$arResult['OFFERS'][0]['ADD_URL']?>" method="post" class="product-add">
                  <input type="number" name="quantity" min="1" max="15" value="1">
                  <input type="submit" value="В корзину">
                  <!--<input type="submit" class="blue" disabled value="Уже в корзине»">-->
                </form>


                <div class="tags-list">
                    Теги:
                </div>
                <div class="social-share">
                    Поделится:
                  <ul class="social-icon">
                    <li><a href="#" class="icon1"></a></li>
                    <li><a href="#" class="icon2"></a></li>
                    <li><a href="#" class="icon3"></a></li>
                    <li><a href="#" class="icon4"></a></li>
                    <li><a href="#" class="icon5"></a></li>
                  </ul>
                </div>

              </div>
              <div class="tabs-light">
                <ul class="tabs-menu">
                  <li><a href="#tab-1">Описание</a></li>
                  <li><a href="#tab-2">Тех. характеристики</a></li>
                  <li><a href="#tab-3">Отзывы</a></li>
                </ul>
                <div class="tabs-content">
                  <div id="tab-1">
                    <h1>Заголовок</h1>
                  </div>
                  <div id="tab-2">
                      <h1>Заголовок</h1>
                  </div>
                  <div id="tab-3">
                      <h1>Заголовок</h1>
                  </div>
                </div>
              </div>

              <div class="block-prev-next">
                <a href="#" class="key prev">Предыдущий</a>
                <a href="#" class="key next">Следующий</a>
              </div>
</section>