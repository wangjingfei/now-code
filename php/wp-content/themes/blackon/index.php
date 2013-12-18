<?php get_header(); ?>
<!-- begin content -->
	<div id="content" class="clearfix">
<!-- begin SlideShow Here -->
    <?php if(get_option('cici_slide')=='yes'){?>
			<?php include (TEMPLATEPATH . '/slider.php'); ?>
	<?php }?> 
	<?php if(get_option('cici_about_txt')!=""){?>
			<div id="boxAbout">
				<p><?php echo stripslashes(get_option('cici_about_txt')); ?></p>
			</div>
		<?php }?>
			<!-- end box about -->
<!-- begin colLeft -->
		<div id="colLeft">
		<!-- archive-title -->				
						<?php if(is_month()) { ?>
						<div id="archive-title">
						Browsing all articles from <strong><?php the_time('F, Y') ?></strong>
						</div>
						<?php } ?>
						<?php if(is_category()) { ?>
						<div id="archive-title">
						Browsing all articles in <strong><?php $current_category = single_cat_title("", true); ?></strong>
						</div>
						<?php } ?>
						<?php if(is_tag()) { ?>
						<div id="archive-title">
						Browsing all articles tagged with <strong><?php wp_title('',true,''); ?></strong>
						</div>
						<?php } ?>
						<?php if(is_author()) { ?>
						<div id="archive-title">
						Browsing all articles by <strong><?php wp_title('',true,''); ?></strong>
						</div>
						<?php } ?>
					<!-- /archive-title -->
			<!-- begin blog item -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="rounded-post-top"></div>
			<div class="aaa"><div class="blogItem"><div class="post-arrow"></div><div class="post-date"><span class="time day"><?php the_time('j') ?> </span><div class="clear"><span class="time month"><?php the_time('M') ?> </span><div class="clear"></div></div><span class="time year"><?php the_time('Y') ?> </span><div class=""clear></div><div class="comm"><?php comments_number('0','1','%'); ?><div class="clear"></div><span>Comm</span></div><div class="author"><span>Posted by</span><div class="auth"><?php the_author(); ?></div></div></div>
				<div class="itemTitle clearfix">
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					
				</div>
				<div class="entry">
				<?php imaj_image(); ?> 
				<?php the_excerpt(20); ?> </div>
				<div class="clear"></div>
				<div class="post-readmore-btn"><a href="<?php the_permalink() ?>">read more</a></div><div class="clear"></div>
				</div>	
			</div>
			<div class="rounded-post-bottom"></div>
			<!-- end blog item -->
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