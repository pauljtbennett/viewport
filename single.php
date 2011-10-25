<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="panel" id="post-<?php the_ID(); ?>" title="<?php the_title() ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>	
			<figure>
				<img src="<?php post_thumb($post, 600, 300); ?>" alt="" title="" />
			</figure>

			<div class="postmeta">
				<time datetime="<?php the_time('Y-m-d'); ?>">Posted on: <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></time>
				<span>Filed under: <?php the_category(', ') ?></span>
				<span><?php the_tags( 'Tagged with: ', ', ', ''); ?></span>
				<span><?php post_comments_feed_link('Comments feed'); ?></span>
			</div>

			<div class="content">
				<?php the_content(); ?>
			</div>

			<?php comments_template(); ?>
		</article>

		<?php get_sidebar(); ?>
		<div class="clearer"></div>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>
