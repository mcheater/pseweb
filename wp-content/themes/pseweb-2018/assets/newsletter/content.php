<?php
	$title			= get_sub_field('title');
	$sub_title		= get_sub_field('sub_title');
	$content		= get_sub_field('content');
?>

<tr>
	<td align="center" valign="top">
		<!-- BEGIN BODY // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody">
			<tr>
				<td valign="top" class="bodyContent" mc:edit="body_content">
					<?php

						if ( $title != null ) {
							echo "<h1>$title</h1>";
						}

						if ( $sub_title != null ) {
							echo "<h2>$sub_title</h2>";
						}

						echo $content;

					?>
				</td>
			</tr>
		</table>
		<!-- // END BODY -->
	</td>
</tr>