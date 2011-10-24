<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="mid" class="single">
		<div class="panel-single" id="post-<?php the_ID(); ?>" title="<?php the_title() ?>">
			<div class="wrapper">
				<?php $image = get_post_meta($post->ID, 'single_image', true); if ($image=="") { $image = get_post_meta($post->ID, 'lead_image', true); }
				$media_type = get_post_meta($post->ID, 'lead_type', true);
				if ($media_type != 'flash') { ?>
					<img src="<?php echo $image; ?>" alt="" width="940" height="300" />
				<? } ?>
				<div class="post-title-single">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</div>
			</div>
		</div>
	</div>
	<div id="content">
		<div id="narrow-column">
		
			<div class="postmetadata">
				<div class="content-top"></div>
				<div class="content-mid">
				Posted on: <?php the_time('l, F jS, Y') ?> at <?php the_time() ?><br />
				Filed under: <?php the_category(', ') ?><br />
				<?php post_comments_feed_link('Comments feed'); ?><br />
	
				<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
					// Both Comments and Pings are open ?>
					<a href="#respond">Leave a response</a><br />
					<a href="<?php trackback_url(); ?>" rel="trackback">Trackback</a>
	
				<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
					// Only Pings are Open ?>
					Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
	
				<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
					// Comments are open, Pings are not ?>
					You can skip to the end and leave a response. Pinging is currently not allowed.
	
				<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
					// Neither Comments, nor Pings are open ?>
					Both comments and pings are currently closed.
	
				<?php } edit_post_link('<br />Edit this entry','',''); ?>
				</div>
				<div class="content-bottom"></div>
			</div>
			<div id="thepost">
				<div class="content-top"></div>
				<div class="content-mid">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
					
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
				</div>
				<div class="content-bottom"></div>
			</div>
			<div id="thecomments">
				<?php comments_template(); ?>
			</div>
			
		</div>
		<?php get_sidebar(); ?>
		<div class="clearer"></div>
	</div>

<?php endwhile; else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
