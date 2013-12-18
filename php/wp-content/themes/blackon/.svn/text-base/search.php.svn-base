<?php get_header(); ?>

	<!-- begin content -->
	<div id="content" class="clearfix">
<!-- begin colLeft -->
<!-- begin col left -->
<!-- begin colLeft -->
	<div id="colLeft" class="clearfix">
			<div class="searchQuery">Search results for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<strong>'); echo $key; _e('</strong>'); wp_reset_query(); ?></div>
			
			
	<?php 
		if (have_posts()) : 
		while (have_posts()) : the_post();  
		if ($post->post_type=='page') continue; ?> 
		
			<!-- blog item -->
			<div class="rounded-post-top"></div>
		<div class="aaa"><div class="blogItem"><div class="post-arrow"></div><div class="post-date"><span class="time day"><?php the_time('j') ?> </span><div class="clear"><span class="time month"><?php the_time('M') ?> </span><div class="clear"></div></div><span class="time year"><?php the_time('Y') ?> </span><div class=""clear></div><div class="comm"><?php comments_number('0','1','%'); ?><div class="clear"></div><span>Comm</span></div><div class="author"><span>Posted by</span><div class="auth"><?php the_author(); ?></div></div></div>
				<div class="itemTitle clearfix">
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					
				</div>
				<?php the_content(__('Read more &raquo;')); ?> 
			</div></div>
			<div class="rounded-post-bottom"></div>
		<!-- end blogItem -->

		<?php endwhile; ?>

		<?php if (function_exists("emm_paginate")) {
    emm_paginate();
} ?>

	<?php else : ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

			
</div>
<!-- end colLeft -->

<!-- begin colRight -->
		<div id="colRight" class="clearfix">	
			<?php get_sidebar(); ?>	
			</div>
<!-- end colRight -->


<?php get_footer(); ?>
