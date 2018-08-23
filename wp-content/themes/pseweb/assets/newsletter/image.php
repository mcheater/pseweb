<?php
	$image		= get_sub_field('image');
?>

<tr>
	<td align="center" valign="top">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader">
			<tr>
				<td valign="top" class="headerContent">
					<?php echo wp_get_attachment_image($image, 'newsletter-image'); ?>
				</td>
			</tr>
		</table>
	</td>
</tr>