<article class="panel" id="post-<?php the_ID(); ?>" title="<?php the_title() ?>">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>	
	<figure>
		<img src="<?php post_thumb($post, 940, 500); ?>" alt="" title="" />
		<figcaption><?php the_excerpt(); ?></figcaption>
	</figure>
</article>