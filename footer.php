		<footer>
			<nav>
				<ul>
					<li><a href="http://paulicio.us/viewport-a-free-wordpress-theme/">Viewport</a>, brought to you by <a href="http://www.smashingmagazine.com">Smashing Magazine</a></li>
					<li><a href="http://wordpress.org/">WordPress</a></li>
					<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
				</ul>
				<ul>
					<li><?php wp_register('','  |  '); ?> <?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as HTML5" class="valid">HTML5</a></li>
				</ul>
			</nav>
		</footer>
	</div>

	<?php wp_footer(); ?>
	</body>
</html>
