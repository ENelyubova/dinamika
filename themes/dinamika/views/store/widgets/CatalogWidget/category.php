<?php if($category) : ?>
	<?php foreach ($category as $key => $data) : ?>
		<?php $child = $data->children(); ?>
		<?php //if($child) : ?>
			<?php //foreach ($child as $key => $item) : ?>
                <div class="header-block fl fl-w">
					<div class="category-title"><?= $data->name; ?></div>
				</div> 
				<?php $this->widget('application.modules.store.widgets.ProductsFromCategoryWidget', [
				    'slug'  => $data->slug,
				    'view' => 'product',
				]); ?>
            <?php //endforeach; ?>
		<?php //endif; ?>
	<?php endforeach; ?>
<?php endif; ?>    

