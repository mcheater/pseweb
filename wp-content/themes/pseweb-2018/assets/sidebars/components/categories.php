<?php
	$category_title		= get_sub_field('category_title', 'option');
?>

<aside class="categories">
	<h3><?php echo $category_title; ?></h3>

	<?php
		$args = array(
			'title_li'	=> '',
		);
		echo '<ul>';
			wp_list_categories( $args );
		echo '</ul>';
	?>

</aside>