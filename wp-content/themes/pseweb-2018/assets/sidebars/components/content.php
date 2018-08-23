<?php
	$content_title		= get_sub_field('content_title', 'option');
	$content_text		= get_sub_field('content_text', 'option');
	$content_link		= get_sub_field('content_link', 'option');
?>

<aside class="block">
	<h3>
		<?php
			if ( $content_link != null ) {
				echo "<a href=\"$content_link\">";
			}

			echo $content_title;

			if ( $content_link != null ) {
				echo "</a>";
			}
		?>
	</h3>
	<?php echo $content_text; ?>
</aside>