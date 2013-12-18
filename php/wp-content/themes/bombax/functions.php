<?php
define('THEME_NICENAME','Bombax');
define('THEME_URI','http://themes.itx.web.id/bombax/');
define('THEME_VERSION', '1.3');

require_once 'includes/common.php';

function itx_content($pos=false){
    global $post;
?>
    <div <?php post_class($pos) ?>>
    <?php
	if ($pos=='featured'){add_filter('excerpt_length', 'itx_featured_length');$thumb=itx_thumbnail(1);$class='itx-featured';}
	else {add_filter('excerpt_length', 'itx_excerpt_length');$thumb=itx_thumbnail();$class='itx-thumb';}
        if(itx_get_option('front','not')||$thumb) $tclass='thumb'; else $tclass='nothumb';
    ?>
        <div class="postwrap ui-widget ui-widget-content <?php echo $tclass?>">
			<?php if (!post_password_required()) itx_meta('commentcount','ui-state-hover');?>
			<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
			<div class="clear"></div>
			<div class="thumbwrap">
				<div class="<?php echo $class ?>">
				<?php echo $thumb;?>
				</div>
			</div>
			<div class="entry">
				<?php if (itx_is_active_meta('left')||itx_is_active_meta('right')):?>
				<div class="meta ui-state-default">
					<div class="right"><?php itx_meta('right');?></div>
					<div class="left"><?php itx_meta('left');?></div>
				</div>
				<?php endif;the_excerpt();?>
			</div>
			<div class="clear"></div>
        </div>
    </div>
<?php if ($pos=='featured') echo '<div class="clear"></div>';
}

function itx_single_content($class=false){
   global $post;
?>
    <div <?php post_class($class) ?>>
        <div class="postwrap ui-widget-content">
			<div class="titlewrap">
				<?php if(!post_password_required()&&comments_open()) itx_single_meta('commentcount','ui-state-hover');?>
				<?php $thetitle=itx_single_title(); if ( !empty($thetitle) ) : ?>
				<?php if ( is_singular() && !is_front_page() ): ?>
				<h1 class="title">
					<a href="<?php the_permalink() ?>" rel="bookmark"><?php echo $thetitle; ?></a>
				</h1>
				<?php else: ?>
				<h3 class="title">
					<a href="<?php the_permalink() ?>" rel="bookmark"><?php echo $thetitle; ?></a>
				</h3>
				<?php endif;endif; ?>
				<div class="clear"></div>
				<div class="meta ui-state-default">
					<?php if (!is_page()) itx_single_meta('date');?>
					<?php itx_single_meta('author');?>
					<div class="clear"></div>
				</div>
				<small><?php edit_post_link('Edit this entry?','',''); ?></small>
			</div>
			<div class="entry">
			<?php the_content();?>
			</div>
			<div class="clear"></div>
            <div class="linkpages"><?php wp_link_pages(array('before'=>'Pages: ','after'=>'','link_before'=>'<span>','link_after'=>'</span>')); ?></div>
            <div class="clear"></div>
            <?php if (itx_is_active_single_meta('categories')||itx_is_active_single_meta('tags')||itx_is_active_single_meta('author_info')): ?>
            <div class="footmeta">
                <?php itx_single_meta('categories');itx_single_meta('tags');itx_single_meta('author_info');?>
            </div>
            <?php endif; ?>
            <div class="clear"></div>
        <?php if (is_singular())comments_template('',true); ?>
        </div>
	</div>
	<div class="clear"></div>
<?php
}

function itx_line_content($class=false){
   global $post;
?>
    <div <?php post_class($class.' ui-widget-content') ?>>
	<div class="left"><?php itx_meta('left');?></div>
	<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
	<?php if (itx_is_active_meta('commentcount')||itx_is_active_meta('right')):?>
	<div class="meta">
		<?php if (!post_password_required()) itx_meta('commentcount','ui-state-active');?>
		<?php itx_meta('right');?>
	</div>
	<?php endif;?>
    </div>
<?php
}

function itx_loop(){
	global $wp_query,$query_string;
	extract(itx_get_option('front'));
	if (is_archive()) $type=$archive_type;
	$column=itx_get_option('front','column');
	if (!is_paged()){
		itx_sidebar('name=innertop');
		if ($type=='fe'||$type=='fl'){
		if (have_posts()){itx_title();the_post(); itx_content('featured');}
		if ($wp_query->post_count<2) $nosearch=1;
		}
	}

	if ($type=='fe'||$type=='fl'){
		$sticky=get_option('sticky_posts');
		if(!$sticky){
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$offset=array('offset'=>(($paged-1)*get_query_var('posts_per_page')+1));
		} else {
			$offset=array('post__not_in'=>array($sticky[0]));
		}
		query_posts(array_merge($offset,$wp_query->query));
	}

	if (have_posts()) {
		if (!($type=='fe'||$type=='fl')||is_paged()){itx_title();}
		if ($type=='fl') echo '<div class="linepostwrap">';
		$i=0;
		while (have_posts()) {
			the_post();
			if ($type=='traditional') itx_single_content('singlepost');
			elseif ($type=='fl') itx_line_content('linepost');
			else {
				$i++;
				$postwrap=ceil($i/$column);
				itx_content('posts postwrap-'.$postwrap);
			}
		}
		if ($type=='fl') echo '</div>';
	} elseif (empty($nosearch)) itx_notfound();
	?>
	<div class="clear"></div>
	<?php if (!is_paged()){itx_sidebar('name=innerbottom');}
}

function itx_single_title(){
	if ( is_singular() && function_exists('ghpseo_output') ) return ghpseo_output('secondary_title',false);
	else return get_the_title();
}

function itx_title(){
	if (function_exists('ghpseo_output')) {
		$out=ghpseo_output('secondary_title',false);
		if(!empty($out)) {?><h2 class="pagetitle"><?php ghpseo_output('secondary_title');?></h2><?php }
	} elseif (is_archive()) {
		?><h2 class="pagetitle"><?php
			/* If this is a category archive */ if (is_category()) { ?>
			<?php single_cat_title();
			/* If this is a tag archive */ } elseif( is_tag() ) { ?>
			Tag: <?php single_tag_title();
			/* If this is a daily archive */ } elseif (is_day()) { ?>
			Archive for <?php the_time('F jS, Y');
			/* If this is a monthly archive */ } elseif (is_month()) { ?>
			Archive for <?php the_time('F, Y');
			/* If this is a yearly archive */ } elseif (is_year()) { ?>
			Archive for <?php the_time('Y');
			/* If this is an author archive */ } elseif (is_author()) { ?>
			Author Archive <?php
		   /* If this is a paged archive */ } else { ?>
			Archives
		<?php }
		?> </h2> <?php
	}
}

function itx_notfound(){
	global $post;
    if (is_search()) {
        $something ='<strong>'.get_search_query().'</strong>';
        $here='again';
    } else {
        $something="something";
        $here='here';
    }
    ?>
    <div class="post">
	<h2 class="pagetitle"><a href="<?php the_permalink() ?>">Not Found</a></h2>
	<div class="postwrap ui-widget-content">
	    <p>Sorry, but you are looking for <?php echo $something ?> that isn't here.
		You can search <?php echo $here ?>
	     <?php if (itx_active_widget('search')):?>
		by using <a href="#searchform">this form</a>...
	     <?php else: ?> using the form below <br />
		<?php get_search_form(); endif;?>
	    </p>
	</div>
    </div>
<?php
}

function itx_links(){?>
	<?php extract(itx_get_option('links'));
	if ($twitter||$facebook||empty($hide_rss)):?>
	<ul id="links">
		<?php if ($twitter): ?><li>
		<a href="http://twitter.com/<?php echo $twitter ?>" rel="nofollow">
			<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt ="my twitter" title="Follow our twitter" />
		</a></li>
		<?php endif;?>

		<?php if ($facebook): ?><li>
		<a href="http://www.facebook.com/<?php echo $facebook ?>" rel="nofollow">
			<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt ="my facebook" title="Follow our facebook" />
		</a></li>
		<?php endif;?>

		<?php if(empty($hide_rss)):?>
		<li><a href="<?php echo $rss ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="<?php bloginfo('name'); ?>" title="Follow our RSS" />
		</a></li>
		<?php endif;?>
	</ul>
	<?php endif;
}
?>