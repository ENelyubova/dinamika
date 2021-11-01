<div class="slider-block">
    <?php $this->widget(
        'bootstrap.widgets.TbListView',
        [
            'dataProvider'  => $dataProvider,
            'itemView'      => '_slick-item',
            'template'      => "{items}",
               'itemsCssClass' => $slickClass,
            'itemsTagName'  => 'div'
        ]
    ); ?>
    <div class="slider-arrows">
        <div class="content-site">
            <div class="arrows"></div>
        </div>
    </div>
    <div class="slider-progress">
        <div class="progress"></div>
    </div>
</div>


