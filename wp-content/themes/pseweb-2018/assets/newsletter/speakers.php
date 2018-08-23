<?php
	$speakers_title		= get_sub_field('speakers_title');
	$speaker_1			= get_sub_field('speaker_1');
	$speaker_2			= get_sub_field('speaker_2');
?>

<?php if ( $speakers_title != null ) { ?>
	<tr>
		<td align="center" valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" id="sectionTitle">
				<tr>
					<td valign="top" class="bodyContent bodyHeading" mc:edit="body_content">
						<h1><?php echo $speakers_title; ?></h1>
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

					// SPEAKER 1
					$post_object = get_sub_field('speaker_1');
					if( $post_object ):
					$post = $post_object;
					setup_postdata( $post );

					$job_title			= get_field('job_title');
					$organization		= get_field('organization');
					$profile_photo		= get_field('profile_photo');
					$email				= get_field('email_address');
				?>

					<td align="center" valign="top" class="templateColumnContainer" style="padding-top:20px;">
						<table border="0" cellpadding="20" cellspacing="0" width="100%">
							<tr>
								<td class="leftColumnContent">
									<?php
										if ( $profile_photo != null ) {
											echo '<div class="speaker-image">';
											echo wp_get_attachment_image($profile_photo, 'speaker-photo');
											echo '</div>';
										}
										elseif ( $profile_photo == null && $email != null ) {
											echo '<div class="speaker-image">';
											echo get_avatar( $email, 350 );
											echo '</div>';
										}
									?>
								</td>
							</tr>
							<tr>
								<td valign="top" class="leftColumnContent" mc:edit="left_column_content">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php echo "$job_title, $organization" ?>
								</td>
							</tr>
						</table>
					</td>

				<?php
					wp_reset_postdata();
					endif;

					// SPEAKER 2
					$post_object = get_sub_field('speaker_2');
					if( $post_object ):
					$post = $post_object;
					setup_postdata( $post );

					$job_title			= get_field('job_title');
					$organization		= get_field('organization');
					$profile_photo		= get_field('profile_photo');
					$email				= get_field('email_address');
				?>

					<td align="center" valign="top" class="templateColumnContainer" style="padding-top:20px;">
						<table border="0" cellpadding="20" cellspacing="0" width="100%">
							<tr>
								<td class="rightColumnContent">
									<?php
										if ( $profile_photo != null ) {
											echo '<div class="speaker-image">';
											echo wp_get_attachment_image($profile_photo, 'speaker-photo');
											echo '</div>';
										}
										elseif ( $profile_photo == null && $email != null ) {
											echo '<div class="speaker-image">';
											echo get_avatar( $email, 350 );
											echo '</div>';
										}
									?>
								</td>
							</tr>
							<tr>
								<td valign="top" class="rightColumnContent" mc:edit="right_column_content">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php echo "$job_title, $organization" ?>
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