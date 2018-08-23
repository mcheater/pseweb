<?php
	$sessions_title		= get_sub_field('sessions_title');
	$session_1			= get_sub_field('session_1');
	$session_2			= get_sub_field('session_2');
?>

<?php if ( $sessions_title != null ) { ?>
	<tr>
		<td align="center" valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" id="sectionTitle">
				<tr>
					<td valign="top" class="bodyContent bodyHeading" mc:edit="body_content">
						<h1><?php echo $sessions_title; ?></h1>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<?php } ?>


<tr>
	<td align="center" valign="top">
		<!-- BEGIN COLUMNS // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateColumns">
			<tr mc:repeatable>

				<?php

					// SESSION 1
					$post_object = get_sub_field('session_1');
					if( $post_object ):
					$post = $post_object;
					setup_postdata( $post );

					$post_title			= get_the_title();
					$post_link			= get_permalink();
					$excerpt = strip_tags(get_the_excerpt());
					$title_len = strlen($post_title);
				?>

					<td align="center" valign="top" class="templateColumnContainer" style="padding-top:20px;">
						<table border="0" cellpadding="20" cellspacing="0" width="100%">
							<tr>
								<td valign="top" class="leftColumnContent" mc:edit="left_column_content">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php
										if ($title_len <= 30){
											$limit = 270; //calc space remaining for excerpt
										}
										elseif ($title_len <= 60){
											$limit = 230; //calc space remaining for excerpt
										}
										elseif ($title_len <= 75){
											$limit = 180;
										}
										elseif ($title_len <= 90){
											$limit = 140;
										}
										else {
											$limit = 100;
										}
										$summary = substr($excerpt, 0, strrpos(substr($excerpt, 0, $limit), ' ')) . '...';

										echo "<p>$summary <a href=\"$post_link\">More</a></p>";
									?>
								</td>
							</tr>
						</table>
					</td>

				<?php
					wp_reset_postdata();
					endif;

					// SESSION 2
					$post_object = get_sub_field('session_2');
					if( $post_object ):
					$post = $post_object;
					setup_postdata( $post );

					$post_title			= get_the_title();
					$post_link			= get_permalink();
					$excerpt = strip_tags(get_the_excerpt());
					$title_len = strlen($post_title);
				?>

					<td align="center" valign="top" class="templateColumnContainer" style="padding-top:20px;">
						<table border="0" cellpadding="20" cellspacing="0" width="100%">
							<tr>
								<td valign="top" class="rightColumnContent" mc:edit="right_column_content">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php
										if ($title_len <= 30){
											$limit = 270; //calc space remaining for excerpt
										}
										elseif ($title_len <= 60){
											$limit = 230; //calc space remaining for excerpt
										}
										elseif ($title_len <= 75){
											$limit = 180;
										}
										elseif ($title_len <= 90){
											$limit = 140;
										}
										else {
											$limit = 100;
										}
										$summary = substr($excerpt, 0, strrpos(substr($excerpt, 0, $limit), ' ')) . '...';

										echo "<p>$summary <a href=\"$post_link\">More</a></p>";
									?>
								</td>
							</tr>
						</table>
					</td>

				<?php
					wp_reset_postdata();
					endif;
				?>

			</tr>
		</table>
		<!-- // END COLUMNS -->
	</td>
</tr>