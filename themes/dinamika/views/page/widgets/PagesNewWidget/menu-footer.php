<?php if($pages) : ?>
    <?php $childs = $pages->childPages(['condition' => 'status=1', 'order' => 'childPages.order ASC']); ?>
    <ul>
        <?php foreach ($childs as $key => $data) : ?>
            <li>
                <a href="<?= Yii::app()->createUrl('/page/page/view', ['slug' => $data->slug]); ?>"><?= $data->title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>