<?php if (post_password_required()) return; ?>

<?php if (have_comments()) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?></h3>
	<ol class="commentlist">
		<?php wp_list_comments(array('callback' => 'viewport_comment', 'style' => 'ol')); ?>
	</ol>
	
	<?php if (!comments_open() && get_comments_number()) : ?>
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>

<?php comment_form(); ?>
