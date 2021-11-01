<?php if($category) : ?>
	<?php foreach ($category as $key => $data) : ?>
		<div class="catalog-block__item">
			<div class="catalog-block__title">
				<a href="<?= $data->getCategoryUrl(); ?>" class="catalog-name"><?= $data->name; ?></a>
				<?php $child = $data->children(); ?>
				<?php if($child) : ?>
					<ul class="child-block">
						<?php foreach ($child as $key => $item) : ?>
		                    <li><a href="<?= $item->getCategoryUrl(); ?>" class="subcategory-name"><?= $item->name; ?></a></li>
			            <?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="catalog-block__img fl fl-jc-c fl-ai-c">
				<a href="<?= $data->getCategoryUrl(); ?>">
					<picture class="">
			            <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
			            <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

			            <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(85, 90, true, null,'image'); ?>" type="image/webp">
			            <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(85, 90, true, null,'image'); ?>">

			            <img src="<?= $data->getImageNewUrl(85, 90, true, null,'image'); ?>" alt="<?= $data->image->alt; ?>">
			        </picture>
				</a>
			</div>
		</div> 
	<?php endforeach; ?>
<?php endif; ?>    
