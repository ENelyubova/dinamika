 <?php
/** @var Page $page */

if ($page->layout) {
    $this->layout = "//layouts/{$page->layout}";
}

$this->title = $page->title;
$this->breadcrumbs = [
    Yii::t('HomepageModule.homepage', 'Pages'),
    $page->title
];
$this->description = !empty($page->meta_description) ? $page->meta_description : Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = !empty($page->meta_keywords) ? $page->meta_keywords : Yii::app()->getModule('yupe')->siteKeyWords
?>

<a href="#0" class="cd-top">Top</a> 
<div class="slider">
    <?php $this->widget("application.modules.gallery.widgets.SlickMyWidget", ['galleryId' => 1,
        'slickClass' => 'carouselSlider slick-slider',
        'view' => 'slick',
    ]); ?>
</div>
<!-- <div class="slider-mobile">
    <?php $this->widget("application.modules.gallery.widgets.SlickMyWidget", ['galleryId' => 2,
        'slickClass' => 'mobileSlider slick-slider',
        'view' => 'mobile-slider',
    ]); ?>
</div> -->

<div class="advantages pt50">
    <div class="content-site">
        <?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
            'id'=> 1,
            'view' => 'advantages'
        ]); ?>
    </div>
</div>

<div class="catalog pt50">
    <div class="content-site">
        <div class="heading-block fl fl-w fl-ai-c">
            <h2 class="heading">Каталог товаров</h2>
            <a href="/store" class="btn btn-blue">Перейти в каталог</a>
        </div>
        <div class="catalog-block fl fl-w">
            <?php $this->widget('application.modules.store.widgets.CatalogWidget', [
                'view' => 'catalog'
            ]); ?>
        </div>
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