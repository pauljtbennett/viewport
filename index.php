<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<section id="slider">
			<div class="slides">			
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('content-slide'); ?>
				<?php endwhile; ?>
			</div><!-- .slides -->
		</section><!-- #slider -->
	<?php else : ?>
	
	<?php endif; ?>

<?php get_footer(); ?>