<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
// Yii::app()->getClientScript()->registerCssFile($mainAssets . '/css/store-frontend.css');
// Yii::app()->getClientScript()->registerScriptFile($mainAssets . '/js/store.js');

/* @var $category StoreCategory */

$this->title = Yii::app()->getModule('store')->metaTitle ?: Yii::t('StoreModule.store', 'Catalog');
$this->description = Yii::app()->getModule('store')->metaDescription;
$this->keywords = Yii::app()->getModule('store')->metaKeyWords;

$this->breadcrumbs = [Yii::t("StoreModule.store", "Catalog")];
?>

<a href="#0" class="cd-top">Top</a> 
<!-- Каталог -->
<div class="store-container store-container-catalog">
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

        <h1 class="heading heading-block"><?= Yii::t("StoreModule.store", "Каталог товаров"); ?></h1>

        <div class="catalog-block fl fl-w">
            <?php $this->widget('application.modules.store.widgets.CatalogWidget', [
                'view' => 'catalog'
            ]); ?>
        </div>
    </div>
    
    <div class="news pt80">
        <div class="content-site">
            <div class="heading-block fl fl-w fl-ai-c">
                <h2 class="heading">Новости и интересные материалы</h2>
                <a href="/news" class="btn btn-blue">Все новости</a>
            </div>
            <div class="news-panel">
                <?php $this->widget("application.modules.news.widgets.MyNewsWidget", [
                    'view' => 'news-home',
                ]); ?>
                <div class="news-arrows">
                    <div class="content-site">
                        <div class="arrows"></div>
                    </div>
                </div>
            </div>
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
</div>


