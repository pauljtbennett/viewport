<?php get_header(); ?>

<div class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>	
			<figure>
				<img src="<?php post_thumb($post, 940, 250); ?>" alt="" title="" />
			</figure>
		</article>
		<article <?php post_class('left'); ?> id="post-<?php the_ID(); ?>" title="<?php the_title() ?>">
			<div class="content">
				<?php the_content(); ?>
			</div>

			<div class="postmeta">
				<time datetime="<?php the_time('c'); ?>">Posted on: <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></time>
				<span>Filed under: <?php the_category(', ') ?></span>
				<span><?php the_tags('Tagged with: ', ', ', ''); ?></span>
				<span><?php post_comments_feed_link('Comments feed'); ?></span>
			</div>

			<?php next_post_link('Next: %link') ?>
			<?php previous_post_link('Previous: %link') ?>

			<?php comments_template(); ?>
		</article>

		<?php get_sidebar(); ?>
		<div class="clearer"></div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
