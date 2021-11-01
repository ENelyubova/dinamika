<?php

/* @var $product Product */

$this->title = $product->getMetaTitle();
$this->description = $product->getMetaDescription();
$this->keywords = $product->getMetaKeywords();
$this->canonical = $product->getMetaCanonical();

$mainAssets = Yii::app()->getModule( 'store' )->getAssetsUrl();
Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/jquery.simpleGal.js' );

Yii::app()->getClientScript()->registerCssFile( Yii::app()->getTheme()->getAssetsUrl() . '/css/store-frontend.css' );
Yii::app()->getClientScript()->registerScriptFile( Yii::app()->getTheme()->getAssetsUrl() . '/js/store.js' );

$this->breadcrumbs = array_merge(
    [ Yii::t( "StoreModule.store", 'Catalog' ) => [ '/store/product/index' ] ],
    $product->category ? $product->category->getBreadcrumbs( true ) : [], [ CHtml::encode( $product->name ) ]
);

?>

<a href="#0" class="cd-top">Top</a> 
<div class="store-container product-container">
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
        
        <?php $attributes = $product->getAttributeGroups(); ?>
        <div class="product-view">
            <div class="product-view-top fl fl-jc-sb">
                <div class="product-view__info">
                    <h1 class="heading heading-block" itemprop="name"><?= CHtml::encode($product->getTitle()); ?></h1>
                    <?php if ($product->short_description): ?>
                        <?= $product->short_description; ?>
                    <?php endif; ?>
                    <div class="product-view__btn">
                        <button class="btn btn-orange" data-toggle="modal" data-target="#productModal" tabindex="0">Получить консультацию</button>
                    </div>

                    <?php if (!empty($attributes)): ?>
                        <div class="category-title">Основные характеристики</div>
                        <div class="product-attributes js-product-attributes">
                            <?php $count = 0; ?>
                            <?php foreach ($product->getAttributeGroups() as $groupName => $items) : ?>
                                <?php foreach ($items as $attribute) : ?>
                                    <?php
                                    $value = AttributeRender::renderValue($attribute, $product->attribute($attribute));
                                    if (empty($value)) {
                                        continue;
                                    }
                                    ?>
                                    <div class="product-attributes__item js-product-attributes-item fl fl-w fl-ai-fs <?= ($count > 4) ? 'hidden' : ''; ?>">
                                        <div class="product-attributes__name"><span><?= CHtml::encode($attribute->title); ?></span></div>
                                        <div class="product-attributes__val"><?= $value; ?></div>
                                    </div>
                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                            <?php if($count > 5) : ?>
                                <div class="product-attributes__after"></div>
                            <?php endif; ?>
                        </div>
                        <?php if($count > 5) : ?>
                            <a class="product-attributes__more js-more-attributes" data-text="Свернуть" href="#">
                                <span>Показать все характеристики</span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <?php $images = $product->getImages(); ?>
                <div class="product-view__img">
                    <div class="image-preview slick-slider">
                        <div>
                            <div class="image-preview__img">
                                <a class="fl fl-ai-c fl-jc-c" data-fancybox="image" href="<?= StoreImage::product($product); ?>">
                                    <img 
                                        class="gallery-image js-product-image" 
                                        src="<?= StoreImage::product($product); ?>" 
                                        itemprop="image"
                                    />
                                </a>
                            </div>
                        </div>
                        <?php foreach ($images as $key => $image) : ?>
                            <?php if($image->group_id == NULL): ?>
                                <div>
                                    <div class="image-preview__img">
                                        <a class="fl fl-ai-c fl-jc-c" data-fancybox="image" href="<?= $image->getImageUrl(); ?>">
                                            <?= CHtml::image($image->getImageUrl(), '', [
                                                'class' => 'gallery-image'
                                            ])?>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </div>

                    <!-- Миниатюры -->
                    <?php if (count($images) > 0) : ?>
                        <div class="image-thumbnail slick-slider">
                            <div class="image-thumbnail__item">
                                <div class="fl fl-ai-c fl-jc-c image-thumbnail__img">
                                    <img src="<?= StoreImage::product($product); ?>" />
                                </div>
                            </div>
                            <?php foreach ($images as $key => $image) : ?>
                                <?php if($image->group_id == NULL): ?>
                                    <div class="image-thumbnail__item">
                                        <div class="fl fl-ai-c fl-jc-c image-thumbnail__img">
                                            <?= CHtml::image($image->getImageUrl(), '', ['style'=>''])?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php $sertificate = $product->images(['condition'=>'images.group_id IS NOT NULL', 'order'=>'group_id DESC']);?>

            <?php if (!empty($product->data) || !empty($product->info) || !empty($product->description) || count($sertificate) > 0 ): ?>
                <div class="product-view-bottom category-info">
                    <ul class="nav nav-tabs" id="myTab">
                        <?php if (!empty($product->data)): ?>
                            <li><a href="#model" data-toggle="tab"><?= Yii::t("StoreModule.store", "Модельный ряд"); ?></a></li>
                        <?php endif; ?> 

                        <?php if (!empty($product->info)): ?>
                            <li><a href="#work" data-toggle="tab"><?= Yii::t("StoreModule.store", "Подробное описание"); ?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($product->description) || count($sertificate) > 0): ?>
                            <li><a href="#doc" data-toggle="tab"><?= Yii::t("StoreModule.store", "Документы и сертификаты"); ?></a></li>
                        <?php endif; ?>
                    </ul>

                    <div class="tab-content">
                        <?php if (!empty($product->data)): ?>
                            <div class="tab-pane" id="model" itemprop="description">
                                <div class="table-wrap"><?= $product->data; ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($product->info)): ?>
                            <div class="tab-pane" id="work">
                                <?= $product->info; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($product->description) || count($sertificate) > 0): ?>
                            <div class="tab-pane" id="doc">
                                <?php if ($product->description) : ?>
                                    <div class="product-docs">
                                        <?= $product->description; ?> 
                                    </div>
                                <?php endif; ?>

                                <?php if (count($sertificate) > 0) : ?>
                                    <div class="sertificate fl fl-w">
                                        <?php foreach ($sertificate as $key => $image) : ?>
                                            <div class="sertificate__item">
                                                <a class="fl fl-ai-c fl-jc-c" data-fancybox="docs" href="<?= $image->getImageUrl(); ?>">
                                                <?= CHtml::image($image->getImageUrl(), '', ['style'=>''])?>
                                                </a>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?> 
        </div>
    </div>
</div>

<div class="advantages pt50">
    <div class="content-site">
        <?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
            'id'=> 1,
            'view' => 'advantages'
        ]); ?>
    </div>
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

<?php Yii::app()->getClientScript()->registerScript("product-myTab", "
    $('#myTab li').first().addClass('active');
    $('.tab-pane').first().addClass('active');

    $('.image-preview').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        dots: false,
        arrows: false,
        asNavFor: '.image-thumbnail',
        responsive: [
            {
                breakpoint: 640,
                settings: {
                    adaptiveHeight: true,
                    arrows: false,
                }
            }
        ]
    });
    $('.image-thumbnail').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            fade: false,
            asNavFor: '.image-preview',
            dots: false,
            arrows: false,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 361,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
            ]
        });
"); ?>



