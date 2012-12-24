<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<section class="main flexslider">
			<ul class="slides">			
				<?php while (have_posts()) : the_post(); ?>
					<li><?php get_template_part('content-slide'); ?></li>
				<?php endwhile; ?>
			</ul><!-- .slides -->
		</section><!-- #slider -->

		<div class="hidden prev-page-link"><?php previous_posts_link(); ?></div>
		<div class="hidden next-page-link"><?php next_posts_link(); ?></div>
	<?php else : ?>
	
	<?php endif; ?>

<?php get_footer(); ?>