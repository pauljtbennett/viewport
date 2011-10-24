<?php 

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

function dp_recent_comments($no_comments = 10, $comment_len = 60) {
    global $wpdb;

	$request = "SELECT * FROM $wpdb->comments";
	$request .= " JOIN $wpdb->posts ON ID = comment_post_ID";
	$request .= " WHERE comment_approved = '1' AND post_status = 'publish' AND post_password =''";
	$request .= " ORDER BY comment_date DESC LIMIT $no_comments";

	$comments = $wpdb->get_results($request);

	if ($comments) {
		foreach ($comments as $comment) {
			ob_start();
			?>
				<li>
					<a href="<?php echo get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID; ?>"><?php echo strip_tags(substr(apply_filters('get_comment_text', $comment->comment_content), 0, $comment_len)); ?><br />
					<span class="listMeta">by <strong><?php echo dp_get_author($comment); ?></strong> on <?php echo $comment->post_title ?></span></a>
				</li>
			<?php
			ob_end_flush();
		}
	} else {
		echo "<li>No comments</li>";
	}
}

function dp_get_author($comment) {
	$author = "";

	if ( empty($comment->comment_author) )
		$author = __('Anonymous');
	else
		$author = $comment->comment_author;

	return $author;
}

function get_background() {
	if(get_option('background_image')!="") {
		return "url(".get_option('background_image').") fixed";
	} else {
		return get_option('background_color');
	}
}

function get_wherenext_image() {
	if(get_option('wherenext_image')!="") {
		return get_option('wherenext_image');
	} else {
		return bloginfo('template_directory')."/images/where.jpg";
	}
}

function update_wherenext_image() {

	if($_REQUEST['update_image'] != get_option('wherenext_image')) {
		update_option('wherenext_image', $_REQUEST['update_image']);
		$done = true;
		$message = "Where Next image";
	}
	display_message($message);
}

function update_bg_image() {
	
	if($_REQUEST['update_background']) {
		update_option('background_image', $_REQUEST['update_background']);
		$done = true;
		$message = "Background image";
	}
	display_message($message);
	
}

function update_bg_color() {

	if($_REQUEST['update_color']) {
		update_option('background_color', $_REQUEST['update_color']);
		update_option('background_image', '');
		$done = true;
		$message = "Background color";
	}
	display_message($message);
	
}
	
function display_message($message) {

	if($message) {
		?><div id="message" class="updated fade">
			<p><?php echo $message; ?> updated.</p>
		</div><?php
	} else {
		?><div id="message" class="updated fade">
			<p>Update failed - please make sure you have entered a new, valid image URL, or chosen a new color.</p>
		</div><?php
	}
	
}

// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');

function mt_add_pages() {
    add_options_page('Viewport Settings', 'Viewport Settings', 8, __FILE__, 'mt_page');
}

function mt_page() {
    if($_REQUEST['submit_wn']){
    	update_wherenext_image();
    }
    if($_REQUEST['submit_bg']){
    	update_bg_image();
    }
    if($_REQUEST['submit_color']){
    	update_bg_color();
    }
    ?>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jscolor.js"></script>
    <div class="wrap">
    	<h2>Change Background Image or Color</h2>
    	<p>Either fill in the image box, or select a color to change the Background Image or Color respectively.</p>
		<form method="post">
			<?php wp_nonce_field('update-options'); ?>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Image URL</th>
				<td><textarea name="update_background" id="bg" cols="30" rows="3"><?php echo get_option('background_image'); ?></textarea><?php if(get_option('background_image')!="") { ?> - This is the current background.<?php } ?></td>
				</tr>
				<tr valign="top">
				<th scope="row">Background Color</th>
				<td><input name="update_color" id="color "class="color{caps:false}" value="<?php echo get_option('background_color'); ?>" /><?php if(get_option('background_image')=="") { ?> - This is the current background.<?php } ?></td>
				</tr>
			</table>
			<input type="hidden" name="action" value="update" />
			<p class="submit">
				<input type="submit" name="submit_bg" value="Update Background Image" /> or <input type="submit" name="submit_color" value="Update Background Color" />
			</p>
		</form>
		<br />
		<h2>Change 'Where Next' Image</h2>
		</p>Updating this box will change the image displayed on the final panel of the slider.</p>
		<form method="post">
			<?php wp_nonce_field('update-options'); ?>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Image URL</th>
				<td><textarea name="update_image" id="image" cols="30" rows="3"><?php echo get_option('wherenext_image'); ?></textarea></td>
				</tr>
			</table>
			<input type="hidden" name="action" value="update" />
			<p class="submit">
				<input type="submit" name="submit_wn" value="Update 'Where Next' Image" />
			</p>
		</form>
	</div><?php
}

?>