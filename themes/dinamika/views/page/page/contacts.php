<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
    $this->layout = "//layouts/{$model->layout}";
}

$this->title = $model->meta_title ?: $model->title;
$this->breadcrumbs = $this->getBreadCrumbs();
$this->description = $model->meta_description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->meta_keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;
?>

<a href="#0" class="cd-top">Top</a> 
<div class="page-txt page-contacts pb80">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
        <h2 class="heading heading-block"><?= $model->title; ?></h2>
        <div class="page-contacts-body">
            <div class="contacts-block fl fl-w">
                <div class="contacts-block__item">
                    <div class="contacts-block__title">Телефоны</div>
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
                    <?php endif; ?>
                </div>
                <div class="contacts-block__item contacts-block__email">
                    <div class="contacts-block__title">Мы всегда на связи</div>
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
                    <?php endif; ?>
                </div>
                <div class="contacts-block__item">
                    <div class="contacts-block__title">Режим работы</div>
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'mode']); ?>
                    <?php endif; ?>
                </div>
                <div class="contacts-block__item">
                    <div class="contacts-block__title">Адрес магазина</div>
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                    <?php endif; ?>
                </div>
                <div class="contacts-block__item">
                    <div class="contacts-block__title">Мы в социальных сетях</div>
                    <div class="contacts-block__social fl fl-ai-c">
                        <?php if (Yii::app()->hasModule('contentblock')) : ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="page-map">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ad020e91d00bc32703182c8c8f4f9ab675e82bc97a44ab0e39dca0db9f000e5bc&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <div class="writetous pt50">
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
