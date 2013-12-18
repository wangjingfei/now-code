<!-- begin box about -->



			<!-- begin colRightInner -->
			<div class="bbb">
			<div id="sidebar-top">
			<!-- begin search box -->
			<?php include (TEMPLATEPATH . '/searchform.php'); ?><div class="clear"></div>
		<!-- end search box --></div>
			<div id="colRightInner">

<?php if(get_option('cici_ads')=='yes'){?>
<?php include (TEMPLATEPATH . '/ad1.php'); ?>
<?php }?>
<?php if(get_option('cici_videos')=='yes'){?>
<?php include (TEMPLATEPATH . '/video.php'); ?>
<?php }?>
<h2>Blogroll</h2>
			<ul>
				<?php get_links(-1, '<li>', '</li>', 'between', FALSE, 'name', FALSE, FALSE, -1, FALSE); ?>
                <li><a href="http://top-wordpress.net">Free wordpress themes</a></li>
			</ul>



<?php 
	/* Widgetized sidebar */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
							
<?php endif; ?>



			</div>
			<div id="sidebar-bottom"></div>
			</div>
			<!-- end colRightInner -->
		</div>
		<!-- end colRight -->
