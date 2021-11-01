<?php
$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
// Yii::app()->getClientScript()->registerCssFile( $mainAssets . '/css/store-frontend.css' );
// Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/store.js' );
Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/index.js', CClientScript::POS_END);
/* @var $category StoreCategory */

$this->title = $category->getMetaTitle();
$this->description = $category->getMetaDescription();
$this->keywords = $category->getMetaKeywords();
$this->canonical = $category->getMetaCanonical();

$this->breadcrumbs = [ Yii::t( "StoreModule.store", "Catalog" ) => [ '/store/product/index' ] ];

$this->breadcrumbs = array_merge(
    $this->breadcrumbs,
    $category->getBreadcrumbs( false )
);

?>
<a href="#0" class="cd-top">Top</a> 
<!-- Конкретная категория -->
<div class="store-container store-container-category">
    <?php if($category->description) : ?>
        <div class="category-top-info">
            <div class="content-site">
                <div class="breadcrumbs">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php $this->widget(
                                'bootstrap.widgets.TbBreadcrumbs',
                                [
                                  'links' => $this->breadcrumbs,
                                ]
                            );?>
                        </div>
                    </div>
                </div>
                <h1 class="heading heading-block"><?= $category->getTitle(); ?></h1>
                <?= $category->description; ?>
            </div>
        </div>
    <?php else: ?> 
        <div class="content-site">
            <div class="breadcrumbs">
                <div class="row">
                    <div class="col-xs-12">
                        <?php $this->widget(
                            'bootstrap.widgets.TbBreadcrumbs',
                            [
                              'links' => $this->breadcrumbs,
                            ]
                        );?>
                    </div>
                </div>
            </div>
            <h1 class="heading heading-block"><?= $category->getTitle(); ?></h1>
        </div>
    <?php endif; ?> 

    <div class="content-site">
        <?php $photos = $category->photos(); ?>
        <?php $child = $category->children(); ?>
        <?php if($child || $category->short_description || $photos) : ?>
            <div class="category-info">
                <ul class="nav nav-tabs" id="myTab">
                    <?php if($child) : ?>
                        <li><a href="#products" data-toggle="tab"><?= Yii::t("StoreModule.store", "Продукция"); ?></a></li>
                    <?php endif; ?> 

                    <?php if (!empty($category->short_description)): ?>
                        <li><a href="#desc" data-toggle="tab"><?= Yii::t("StoreModule.store", "Подробное описание"); ?></a></li>
                    <?php endif; ?>
                    <?php if (count($photos) > 0): ?>
                        <li><a href="#sertificate" data-toggle="tab"><?= Yii::t("StoreModule.store", "Сертификаты"); ?></a></li>
                    <?php endif; ?>
                </ul>

                <div class="tab-content">
                    <?php if($child) : ?>
                        <div class="tab-pane" id="products" itemprop="description">
                            <div class="subcategory fl fl-w">
                                <?php foreach ($child as $key => $item) : ?>
                                    <div class="subcategory__item fl fl-ai-c fl-jc-c">
                                        <a href="<?= $item->getCategoryUrl(); ?>" class="fl fl-d-c fl-jc-sb">
                                            <div class="subcategory__name"><?= $item->name; ?></div>
                                            <?php if ($item->image): ?>
                                                <div class="subcategory__img fl fl-jc-c">
                                                    <picture class="absolute-img-pictur">
                                                        <source media="(min-width: 401px)" srcset="<?= $item->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                                                        <source media="(min-width: 401px)" srcset="<?= $item->getImageNewUrl(0, 0, true, null,'image'); ?>">

                                                        <source media="(min-width: 1px)" srcset="<?= $item->getImageUrlWebp(80, 90, true, null,'image'); ?>" type="image/webp">
                                                        <source media="(min-width: 1px)" srcset="<?= $item->getImageNewUrl(80, 90, true, null,'image'); ?>">

                                                        <img src="<?= $item->getImageNewUrl(80, 90, true, null,'image'); ?>" alt="<?= $item->title; ?>">
                                                    </picture>
                                                </div>
                                            <?php else: ?>
                                                <div class="subcategory__img fl fl-jc-c">
                                                    <?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/nophoto.jpg','', []); ?>
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                    </div> 
                                <?php endforeach; ?>
                            </div>
                            <div class="product-list fl fl-d-c">
                                <?php $this->widget('application.modules.store.widgets.CatalogWidget', [
                                    'view' => 'category',
                                    'category_id' => $category->id,
                                ]); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($category->short_description)): ?>
                        <div class="tab-pane" id="desc">
                            <?= $category->short_description; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (count($photos) > 0) : ?>
                        <div class="tab-pane" id="sertificate">
                            <div class="sertificate fl fl-w">
                                <?php foreach ($photos as $key => $image) : ?>
                                    <div class="sertificate__item">
                                        <a class="fl fl-ai-c fl-jc-c" data-fancybox="docs" href="<?= $image->getImageUrl(); ?>">
                                            <?= CHtml::image($image->getImageUrl(), '', [
                                                'class' => 'gallery-image'
                                            ])?>
                                        </a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="category-info">
                <?php $this->widget(
                    'bootstrap.widgets.TbListView',
                    [
                        'dataProvider' => $dataProvider,
                        'id' => 'product-box',
                        'itemView' => '//store/product/_item',
                        'summaryText' => '',
                        'enableHistory' => true,
                        'cssFile' => false,
                        'itemsCssClass' => 'product-list fl fl-w',
                        // 'summaryText'=>"Товаров на странице: <span>{start} - {end} из {count}</span>",
                        'htmlOptions' => [
                          'class' => 'product-box-listView'
                        ],
                        'template'=>'
                              {summary}
                              {items}
                              {pager}
                        ',
                        /*
                        'sortableAttributes' => [
                            'name',
                            'price',
                        ],*/
                    ]
                ); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="writetous pt80 pb80">
      <div class="content-site">
          <div class="writetous-block fl fl-w">
              <div class="writetous-text">
                  <div class="writetous__title">Есть вопросы <br>или нужна консультация?</div>
                  <div class="writetous__body">Напишите нам или свяжитесь любым удобным <br>для вас способом</div>
                  <a href="#writeUsModal" data-toggle="modal" class="btn btn-orange">Написать нам</a>
              </div>
              <div class="writetous-btn">
                  <div class="writetous__phone">
                      <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
                    <?php endif; ?>
                  </div>
                  <div class="writetous__email">
                      <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
                    <?php endif; ?>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>

<?php Yii::app()->getClientScript()->registerScript("product-tab", "
        $('#myTab li').first().addClass('active');
        $('.tab-pane').first().addClass('active');
"); ?>


