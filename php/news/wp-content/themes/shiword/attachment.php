<?php get_header(); ?>

<?php if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<div id="close_preview">
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Close', 'shiword' ); ?></a>
				<a href="javascript:window.print()" id="print_button"><?php _e( 'Print', 'shiword' ); ?></a>
				<script type="text/javascript" defer="defer">
					document.getElementById("print_button").style.display = 'block'; // print button (available only with js active)
				</script>
			</div>

			<h2 class="storytitle">
				<a href="<?php the_permalink() ?>" rel="bookmark">
				<?php
				$post_title = the_title_attribute( 'echo=0' );
				if ( !$post_title ) {
					_e( '(no title)', 'shiword' );
				} else {
					echo $post_title;
				}
				?>
				</a>
			</h2>
			<div style="position: relative; margin-right: 12px;">
				<div class="meta top_meta">
					<div class="metafield_trigger" style="left: 10px;"><?php _e( 'by', 'shiword' ); ?> <?php the_author() ?></div>
					<div class="metafield">
						<div class="metafield_trigger mft_date" style="right: 40px; width:16px"> </div>
						<div class="metafield_content">
							<?php printf( __( 'Published on: <b>%1$s</b>', 'shiword' ), '' ); the_time( get_option( 'date_format' ) ); ?>
						</div>
					</div>
					<div class="metafield">
						<div class="metafield_trigger mft_comm" style="right: 10px; width:16px"> </div>
						<div class="metafield_content">
							<?php _e( 'Comments', 'shiword' ); ?>:
							<?php comments_popup_link( __( 'No Comments', 'shiword' ), __( '1 Comment', 'shiword' ), __( '% Comments', 'shiword' ) ); // number of comments?>
						</div>
					</div>
					<div class="metafield_trigger edit_link" style="right: 70px;"><?php edit_post_link( __( 'Edit', 'shiword' ),'' ); ?></div>
				</div>
			</div>

			<div class="storycontent">

				<div class="entry-attachment" style="text-align: center;">

					<?php if ( wp_attachment_is_image() ) { //from twentyten WP theme
						$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
						foreach ( $attachments as $k => $attachment ) {
							if ( $attachment->ID == $post->ID )
								break;
						}
						$k++;
						// If there is more than 1 image attachment in a gallery
						if ( count( $attachments ) > 1 ) {
							if ( isset( $attachments[ $k ] ) )
								// get the URL of the next image attachment
								$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
							else
								// or get the URL of the first image attachment
								$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
						} else {
							// or, if there's only 1 image attachment, get the URL of the image
							$next_attachment_url = wp_get_attachment_url();
						}
						?>
						<p class="attachment"><a href="<?php echo $next_attachment_url; ?>#posts_content" title="<?php echo esc_attr( strip_tags( get_the_title() ) ); ?>" rel="attachment"><?php
							$attachment_size = apply_filters( 'shiword_attachment_size', 686 );
							echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
						?></a></p>
					<?php } else { ?>
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( strip_tags( get_the_title() ) ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
					<?php } ?>
				</div><!-- .entry-attachment -->
				<div class="entry-caption"><?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?></div>
			</div>
			<?php if ( wp_attachment_is_image() ) { //from twentyten WP theme  ?>
				<div>
					<div class="comment_tools" style="text-align: center;">
						<div class="alignleft" style="min-height: 1px; width: 270px; text-align: left;"><?php previous_image_link( false , __( '&laquo; Previous Image', 'shiword' ) ); // link to Previous image ?></div>
						<div class="alignright" style="min-height: 1px; width: 270px; text-align: right;"><?php next_image_link( false , __( 'Next Image &raquo;', 'shiword' ) ); // link to Next image ?></div>
						<a class="dim_cpc" href="<?php echo wp_get_attachment_url(); ?>" title="<?php _e( 'View full size','shiword' ) ;  // link to Full size image ?>" rel="attachment" target="_blank">100%</a>
						<div class="fixfloat"></div>
					</div>
				</div>
			<?php } ?>
			<div class="fixfloat">
					<?php wp_link_pages( 'before=<div class="comment_tools">' . __( 'Pages:', 'shiword' ) . '&after=</div><div class="fixfloat"></div>' ); ?>
			</div>
			<div class="fixfloat"> </div>
			<?php $tmptrackback = get_trackback_url(); ?>
		</div>

		<?php comments_template(); // Get wp-comments.php template ?>

		<?php	} //end while
	} else {?>

		<p><?php _e( 'Sorry, no posts matched your criteria.', 'shiword' );?></p>

	<?php } ?>

<?php get_footer(); ?>
