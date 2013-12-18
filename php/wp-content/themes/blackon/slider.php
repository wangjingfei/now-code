    <div id="slideshow" class="clearfix">
<div id="featured-tag"></div>
        <div id="slider" class="clearfix">
        
        	<?php
			$scat = get_option('cici_slide_cat');
			$snum =  get_option('cici_slide_num');
			$scat = get_cat_id($scat);
			?>
        
        	<?php $my_query = new WP_Query('cat='.$scat.'&posts_per_page='.$snum.'');
            while ($my_query->have_posts()) : $my_query->the_post();
            $do_not_duplicate = $post->ID;?>            
                        
            <div class="featured-post clearfix" >
                <div class="slider-image">
				<?php $screen = get_post_meta($post->ID,'slide', true); ?>
                    <img src="<?php echo ($screen); ?>" alt="<?php the_title(); ?>"width="936" height="231"  class="">     
<div class="slider-post">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>                				
                   <!--slider-post-meta -->
                    <p><?php the_content_rss('', TRUE, '', 40); ?></p>
                </div><!--slider-post --> 					
                </div><!--slider-image -->	
                
                
                
            </div><!-- featured-post -->            
            
            <?php endwhile; ?>
            
        </div><!-- slider --> 
                    
        <div class="slider-arrow" class="clearfix">
            <a href="#"><span id="prev">Prev</span></a> 
            <a href="#"><span id="next">Next</span></a>
        </div><!--slider-arrow -->
            
        <div id="slider-nav" class="clearfix"></div>

    </div><!-- slideshow-->