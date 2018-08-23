<?php
	$button_text		= get_sub_field('button_text', 'option');
	$button_link		= get_sub_field('button_link', 'option');
	$button_colour		= get_sub_field('button_colour', 'option');
?>

<aside class="button button-<?php echo $button_colour; ?>">
	<a href="<?php echo $button_link; ?>">
		<p><?php echo $button_text; ?></p>
	</a>
</aside>

