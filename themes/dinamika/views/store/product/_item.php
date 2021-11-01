<div class="product__item">
    <a href="<?= ProductHelper::getUrl($data); ?>" class="product__item-wrap fl fl-d-c fl-jc-sb">
        <div class="product__img fl fl-jc-c fl-ai-c">
            <picture class="absolute-img-pictur">
                <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

                <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(80, 90, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(80, 90, true, null,'image'); ?>">

                <img src="<?= $data->getImageNewUrl(80, 90, true, null,'image'); ?>" alt="<?= $data->title; ?>">
            </picture>
        </div>
        <div class="product__title">
            <?= $data->name; ?>
        </div>
    </a>
</div>
