<?php
	// ## - Sharing Tools
	//--------------------------------------------------------------------------------------
	$sharetitle_wp		= get_the_title();
	$sharetitle 		= urlencode($sharetitle_wp);
	$sharelink_wp		= get_permalink();
	$sharelink			= urlencode($sharelink_wp);
?>

<div class="socialmeta">
	<p>Share this page</p>
	<ul>
		<li>
			<a class="twitter" href="http://twitter.com/share?text=<?php echo $sharetitle; ?>&amp;url=<?php echo $sharelink; ?>">
				<div aria-hidden="true" class="social-icons icon-twitter-box"></div>
				<span class="hidden">Twitter</span>
			</a>
		</li>
		<li>
			<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $sharelink; ?>&amp;t=<?php echo $sharetitle; ?>">
				<div aria-hidden="true" class="social-icons icon-facebook-box"></div>
				<span class="hidden">Facebook</span>
			</a>
		</li>
		<li>
			<a class="gplus" href="https://plus.google.com/share?url=<?php echo $sharelink ?>">
				<div aria-hidden="true" class="social-icons icon-gplus-box"></div>
				<span class="hidden">Google Plus</span>
			</a>
		</li>
		<li>
			<a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $sharelink ?>&amp;title=<?php echo $sharetitle ?>&amp;source=PSEWEB">
				<div aria-hidden="true" class="social-icons icon-linkedin-box"></div>
				<span class="hidden">LinkedIn</span>
			</a>
		</li>
		<li>
			<a class="evernote" href="http://www.addtoany.com/add_to/evernote?linkurl=<?php echo $sharelink ?>&amp;linkname=<?php echo $sharetitle ?>">
				<div aria-hidden="true" class="social-icons icon-evernote-box"></div>
				<span class="hidden">LinkedIn</span>
			</a>
		</li>
		<li>
			<a class="email" href="mailto:?subject=News%20post%20from%20&#35;PSEWEB&amp;body=<?php echo $sharetitle_wp ?>%20&mdash;%20<?php echo $sharelink ?>">
				<div aria-hidden="true" class="social-icons icon-email-box"></div>
				<span class="hidden">Email</span>
			</a>
		</li>
	</ul>
</div>