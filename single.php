<?php get_header(); ?>

<div class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>	
			<figure>
				<img src="<?php post_thumb($post, 940, 250); ?>" alt="" title="" />
				<figcaption class="postmeta">
					<time datetime="<?php the_time('c'); ?>"><?php echo timesince(get_the_time('U')); ?></time>
					<span><?php the_category(', ') ?></span>
					<span><?php the_tags('', ', ', ''); ?></span>
					<span><?php comments_number('No comments', 'One comment', '% comments' );?></span>			
				</figcaption>
			</figure>
		</article>
		<article <?php post_class('left'); ?> id="post-<?php the_ID(); ?>" title="<?php the_title() ?>">
			<div class="content">
				<?php the_content(); ?>
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
