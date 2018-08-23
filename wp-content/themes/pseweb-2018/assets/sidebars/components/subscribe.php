<?php
	$signup_title = get_sub_field('signup_title', 'option');
?>

<aside class="mailchimp">
	<?php
		if ( $signup_title != null ) {
			echo "<h3>$signup_title</h3>";
		} else {
			echo '<h3>Stay Up to Date</h3>';
		}
	?>
	<div id="mc_embed_signup">
		<form action="//pseweb.us1.list-manage.com/subscribe/post?u=ff01fb833c19abb7fa5c901fc&amp;id=f5e344504c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<div id="mc_embed_signup_scroll">
				<label for="mce-EMAIL">Subscribe to our mailing list</label>
				<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
				<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				<label for="mce-TEXTTYPE">Subscribe to our mailing list</label>
				<div style="position: absolute; left: -5000px;"><input id="mce-TEXTTYPE" type="text" name="b_ff01fb833c19abb7fa5c901fc_f5e344504c" tabindex="-1" value=""></div>
				<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
			</div>
		</form>
	</div>

</aside>