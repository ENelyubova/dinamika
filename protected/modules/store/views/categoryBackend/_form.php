<?php
/**
 * @var $this CatalogBackendController
 * @var $model StoreCategory
 * @var $form \yupe\widgets\ActiveForm
 */
?>

<ul class="nav nav-tabs">
    <li class="active"><a href="#common" data-toggle="tab"><?= Yii::t("StoreModule.store", "Common"); ?></a></li>
    <li><a href="#options" data-toggle="tab"><?= Yii::t("StoreModule.store", "More options"); ?></a></li>
    <li><a href="#seo" data-toggle="tab"><?= Yii::t("StoreModule.store", "SEO"); ?></a></li>
    <li><a href="#photos" data-toggle="tab"><?= Yii::t("StoreModule.store", "Галерея"); ?></a></li>
</ul>

<?php
$form = $this->beginWidget(
    '\yupe\widgets\ActiveForm',
    [
        'id' => 'category-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'htmlOptions' => ['class' => 'well', 'enctype' => 'multipart/form-data'],
    ]
); ?>

<div class="alert alert-info">
    <?= Yii::t('StoreModule.store', 'Fields with'); ?>
    <span class="required">*</span>
    <?= Yii::t('StoreModule.store', 'are required'); ?>
</div>

<?= $form->errorSummary($model); ?>

<div class="tab-content">
    <div class="tab-pane active" id="common">

        <div class='row'>
            <div class="col-sm-3">
                <?= $form->dropDownListGroup(
                    $model,
                    'parent_id',
                    [
                        'widgetOptions' => [
                            'data' => StoreCategoryHelper::formattedList(),
                            'htmlOptions' => [
                                'empty' => Yii::t('StoreModule.store', '--no--'),
                                'encode' => false,
                            ],
                        ],
                    ]
                ); ?>
            </div>
            <div class="col-sm-4">
                <?= $form->dropDownListGroup(
                    $model,
                    'status',
                    [
                        'widgetOptions' => [
                            'data' => $model->getStatusList(),
                        ],
                    ]
                ); ?>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-7">
                <?= $form->textFieldGroup($model, 'name'); ?>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-7">
                <?= $form->slugFieldGroup($model, 'slug', ['sourceAttribute' => 'name']); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <?= $form->textFieldGroup($model, 'title'); ?>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-7">
                <div class="preview-image-wrapper<?= !$model->isNewRecord && $model->image ? '' : ' hidden' ?>">
                    <div class="btn-group image-settings">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="collapse"
                                data-target="#image-settings"><span class="fa fa-gear"></span></button>
                        <div id="image-settings" class="dropdown-menu">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <?= $form->textFieldGroup($model, 'image_alt'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <?= $form->textFieldGroup($model, 'image_title'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    echo CHtml::image(
                        !$model->isNewRecord && $model->image ? $model->getImageUrl() : '#',
                        $model->name,
                        [
                            'class' => 'preview-image img-thumbnail',
                            'style' => !$model->isNewRecord && $model->image ? '' : 'display:none'
                        ]
                    ); ?>
                </div>
                <?= $form->fileFieldGroup(
                    $model,
                    'image',
                    [
                        'widgetOptions' => [
                            'htmlOptions' => [
                                'onchange' => 'readURL(this);',
                            ],
                        ],
                    ]
                ); ?>
            </div>
        </div>

        <div class='row'>
            <div class="col-sm-12 <?= $model->hasErrors('description') ? 'has-error' : ''; ?>">
                <?= $form->labelEx($model, 'description'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'description',
                    ]
                ); ?>
                <p class="help-block"></p>
                <?= $form->error($model, 'description'); ?>
            </div>
        </div>

        <div class='row'>
            <div class="col-sm-12 <?= $model->hasErrors('short_description') ? 'has-error' : ''; ?>">
                <?= $form->labelEx($model, 'short_description'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'short_description',
                    ]
                ); ?>
                <p class="help-block"></p>
                <?= $form->error($model, 'short_description'); ?>
            </div>
        </div>


    </div>

    <div class="tab-pane" id="options">
        <div class="row">
            <div class="col-sm-7">
                <?= $form->textFieldGroup($model, 'view'); ?>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="seo">
        <div class="row">
            <div class="col-sm-7">
                <?= $form->textFieldGroup($model, 'meta_title'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <?= $form->textFieldGroup($model, 'meta_keywords'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <?= $form->textAreaGroup($model, 'meta_description'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <?= $form->textFieldGroup($model, 'meta_canonical'); ?>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="photos">
        <div id="photos">
            <style type="text/css">
                .image-wrapper{
                    border: 1px solid #cecece;
                }
                .gallery-thumbnail .move-sign{
                    left: 50%;
                    top: 50%;
                    transform: translate(-50%, -50%);
                }
                #page-photos{
                    width:  auto;
                    text-align: center
                }
                .page-photo{
                    display: block;
                    float: left;
                    margin: 5px;
                    position: relative;
                }
                .page-photo .form-group label{
                    font-size: 12px;
                }
                .page-photo__img{
                    position: relative;
                    padding: 0 0 10px;
                }
                .page-delete-photo{
                    position: absolute;
                    top:  5px;
                    right:  5px;
                }
                .page-delete-photo .fa-fw {
                    color: #fff;
                    font-size: 1.5em;
                    padding: 3px;
                    background: rgba(0, 0, 0, 0.3);
                }
            </style>
           <?php 
               Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
               $mainAssets = Yii::app()->assetManager->publish(Yii::getPathOfAlias('gallery.views.assets'));
                Yii::app()->getClientScript()->registerCssFile($mainAssets . '/css/gallery.css');
                Yii::app()->getClientScript()->registerScriptFile($mainAssets . '/js/gallery-sortable.js', CClientScript::POS_END);
                
                $this->widget('gallery.extensions.colorbox.ColorBox', [
                    'target' => '.gallery-image',
                    'config' => [ // тут конфиги плагина, подробнее http://www.jacklmoore.com/colorbox
                    ],
                ]);
                $keys = [];
                ?>
    
    
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Добавить изображения</label>
                            <?php echo CHtml::fileField("CategoryImage[][image]",'', ['multiple'=>true]); ?><br/>
                        </div>
                    </div>
                </div>
                <?php if (!$model->getIsNewRecord()): ?>
                    <div id="gallery-wrapper">
                        <div class="row gallery-thumbnails thumbnails">
                            <?php foreach ($model->photos(['order' => 'position DESC']) as $image): ?>
                                <?php $keys[] = sprintf('<span data-order="%d">%d</span>', $image->position, $image->id); ?>
                                <div class="image-wrapper">
                                    <div class="gallery-thumbnail">
                                        <div class="page-photo">
                                            <div class="page-photo__img">
                                                <div class="move-sign">
                                                    <span class="fa fa-4x fa-arrows"></span>
                                                </div>
                                                <a data-id="<?= $image->id; ?>" href="<?= Yii::app()->createUrl(
                                                    '/store/categoryBackend/deletePhoto',
                                                    ['id' => $image->id]
                                                ); ?>" class="pull-right page-delete-photo"><i class="fa fa-fw fa-times"></i></a>
                                                <img src="<?= $image->getImageUrl(170, 170); ?>" alt=""/>
                                            </div>
                                            <div class="form-group">
                                                <?= CHtml::textField('CategoryImage['.$image->id.'][title]', $image->title,['class' => 'form-control', 'placeholder' => 'Title']) ?>
                                            </div>
                                            <div class="form-group">
                                                <?= CHtml::textField('CategoryImage['.$image->id.'][alt]', $image->alt,['class' => 'form-control', 'placeholder' => 'Alt']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <div class="sortOrder hidden"
                data-token-name="<?= Yii::app()->getRequest()->csrfTokenName; ?>"
                data-token="<?= Yii::app()->getRequest()->getCsrfToken(); ?>"
                data-action="<?= Yii::app()->createUrl('/store/categoryBackend/sortablephoto') ?>"
                >
                <?= implode('', $keys) ?>
            </div>
        </div>
    </div>

    
</div>



<?php $this->widget(
    'bootstrap.widgets.TbButton',
    [
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? Yii::t('StoreModule.store', 'Create category and continue') : Yii::t('StoreModule.store', 'Save category and continue'),
    ]
); ?>

<?php $this->widget(
    'bootstrap.widgets.TbButton',
    [
        'buttonType' => 'submit',
        'htmlOptions' => ['name' => 'submit-type', 'value' => 'index'],
        'label' => $model->isNewRecord ? Yii::t('StoreModule.store', 'Create category and close') : Yii::t('StoreModule.store', 'Save category and close'),
    ]
); ?>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    $(function () {
        $('.page-delete-photo').on('click', function (event) {
            event.preventDefault();
            var blockForDelete = $(this).closest('.image-wrapper');
            $.ajax({
                type: "POST",
                data: {
                    'id': $(this).data('id'),
                    '<?= Yii::app()->getRequest()->csrfTokenName;?>': '<?= Yii::app()->getRequest()->csrfToken;?>'
                },
                url: '<?= Yii::app()->createUrl('/store/categoryBackend/deleteImage');?>',
                success: function () {
                    blockForDelete.remove();
                }
            });
        });
    });
    $(this).closest('.page-image').remove();
    $('#page-images').on('click', '.button-delete-image', function () {
        $(this).closest('.row').remove();
    });
</script>
