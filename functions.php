<?php

/* Add support for featured images */
add_theme_support('post-thumbnails');

/* Automatically resize featured image */
function post_thumb($post, $width = 100, $height = 100) {
	if ($post) {
		$image = str_replace(get_bloginfo('url'), '', wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'));
		$url = $image[0];

		if (!$url) $url = str_replace(get_bloginfo('url'), '', get_bloginfo('template_directory')) . '/images/placeholder.png';

		thumb($url, $width, $height);
	}
}

/* Get thumb URL */
function thumb($src, $width = 100, $height = 100, $zoom = 1)
{
	echo get_bloginfo('template_url') . '/thumb.php?src=' . $src . '&amp;w=' . $width . '&amp;h=' . $height . '&amp;zc=' . $zoom;
}

function get_placeholder_image()
{
	return get_bloginfo('template_url') . '/images/placeholder.png';
}

function timesince($original)
{
	// array of time period chunks
	$chunks = array(
		array(60 * 60 * 24 * 365 , 'year'),
		array(60 * 60 * 24 * 30 , 'month'),
		array(60 * 60 * 24 * 7, 'week'),
		array(60 * 60 * 24 , 'day'),
		array(60 * 60 , 'hour'),
		array(60 , 'minute'),
		array(1 , 'second')
	);

	$today = time();
	$since = $today - $original;

	if ($since > 604800) {
		$c = date("M jS", $original);

		if ($since > 31536000) {
			$c .= ", " . date("Y", $original);
		}

		return $c;
	}

	for ($i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];
		$name = $chunks[$i][1];

		// finding the biggest chunk (if the chunk fits, break)
		if (($count = floor($since / $seconds)) != 0) {
			break;
		}
	}

	$c = ($count == 1) ? '1 '.$name : "$count {$name}s";

	return $c . " ago";
}

function viewport_comment($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;

	switch ($comment->comment_type) :
		case 'pingback' :
		case 'trackback' :
	?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p>Pingback: <?php comment_author_link(); ?> <?php edit_comment_link('Edit', '', ''); ?></p>
	<?php
			break;
		default :
			global $post;
	?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div class="avatar left">
				<?php echo get_avatar($comment, 50); ?>
			</div>

			<h4><?php comment_author_link() ?></h4>
			
			<time datetime="<?php comment_date('c'); ?>">
				<a href="#comment-<?php comment_ID() ?>"><?php echo timesince(get_comment_date('U')); ?></a>
			</time>

			<?php if ($comment->comment_approved == '0') : ?>
				<p><em>Your comment is awaiting moderation.</em></p>
			<?php endif; ?>
			<?php comment_text(); ?>
			<?php edit_comment_link('Edit','',''); ?>
			<?php comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])); ?> 

			<div class="clearer"></div>
	<?php
		break;
	endswitch;
}

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</li>',
		'before_title' 	=> '<h2 class="widgettitle">',
		'after_title' 	=> '</h2>',
	));	
}

?>