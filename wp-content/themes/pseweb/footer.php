	<?php include('assets/footer/components/tweets.php'); ?>

	<div class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<?php
						if( is_home() ) {
							echo "<h2><span>#</span>PSEWEB</h2>";
						} else {
							echo "<h2><a href=\"$site_url\"><span>#</span>PSEWEB</a></h2>";
						}
					?>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<p><a class="button" href="<?php echo $button_link_left; ?>"><?php echo $button_txt_left; ?></a></p>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<p><a class="button" href="<?php echo $button_link_middle; ?>"><?php echo $button_txt_middle; ?></a></p>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<p><a class="button" href="<?php echo $button_link_right; ?>"><?php echo $button_txt_right; ?></a></p>
				</div>

			</div>
		</div>
	</div>

</div> <!-- end #container -->

<?php wp_footer(); ?>

</body>
</html>