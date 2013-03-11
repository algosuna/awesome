<aside id="sidebar">
	<section class="widget">
		<h3>Filter by Brand</h3>
		<ul>
			<?php wp_list_categories(array(
				'taxonomy'=>'brand',
				'title_li'=>''
			)); ?>
		</ul>
		<h3>Filter by Features</h3>
		<ul>
			<?php wp_list_categories(array(
				'taxonomy'=>'features',
				'title_li'=>''
			)); ?>
		</ul>
	</section>
</aside>