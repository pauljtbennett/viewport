<aside id="sidebar" class="left">
	<div class="sidebar-top"></div>
	<div class="sidebar-mid">
		<ul>
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
				<?php if (is_404() || is_category() || is_day() || is_month() || is_year() || is_search() || is_paged()) :?>
					<li>
						<?php if (is_404()) : ?>
						<?php elseif (is_category()) : ?>
							<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
						<?php elseif (is_day()) : ?>
							<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for the day <?php the_time('l, F jS, Y'); ?>.</p>
						<?php elseif (is_month()) : ?>
							<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for <?php the_time('F, Y'); ?>.</p>
						<?php elseif (is_year()) : ?>
							<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for the year <?php the_time('Y'); ?>.</p>
						<?php elseif (is_search()) : ?>
							<p>You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>
						<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
							<p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>
						<?php endif; ?>
					</li>
				<?php endif; ?>

				<li>
					<h2>Archives</h2>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>

				<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
			<?php endif; ?>
		</ul>
	</div>
	<div class="sidebar-bottom"></div>
</aside>

