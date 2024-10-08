 <?php if( !is_search() ){ 

 	if( is_single() ){
 		$show_date = spalisho_post_show_date() == 'yes' ? true: false;
	 	$show_cat  = spalisho_post_show_cat() == 'yes' ? true: false;
	 	$show_author = spalisho_post_show_author() == 'yes' ? true: false;
	 	$show_comment = spalisho_post_show_comment() == 'yes' ? true: false;	
 	}else{
 		$show_date = spalisho_blog_show_date() == 'yes' ? true: false;
	 	$show_cat  = spalisho_blog_show_cat() == 'yes' ? true: false;
	 	$show_author = spalisho_blog_show_author() == 'yes' ? true: false;
	 	$show_comment = spalisho_blog_show_comment() == 'yes' ? true: false;	
 	}
 	

 	?>

 	<?php if( $show_date || $show_cat || $show_author || $show_comment ){ ?>
 		<ul class="post-meta">
 	<?php } ?>
 		
 		<?php if( $show_date ){ ?>
	 		<li class="date">
	 			<i class="xpicon-calendar-1"></i>
			    <?php the_time( get_option( 'date_format' ));?>
	 		</li>
 		<?php } ?>

 		<?php if( $show_cat ){ ?>
	 		<li class="category">
	 			<i class="xpicon-folder-1"></i>
	 			<?php 
	 				$categories = get_the_category();
	 				if ( !empty( $categories ) && is_array( $categories ) ) {
	 					printf( '<a href="%s">%s</a>', esc_url( get_category_link( $categories[0]->term_id ) ), esc_html( $categories[0]->name ) );
	 				}
	 			?>
	 		</li>
 		<?php } ?>

 		<?php if( $show_author ){ ?>
	 		<li class="author">
	 			<i class="xpicon-user-1"></i>
	 			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
	 				<?php the_author_meta( 'display_name' ); ?>
	 			</a>
	 		</li>
 		<?php } ?>
 		
 		<?php if( $show_comment ){ ?>
	 		<li class="comment">
	 			<i class="xpicon-chat-comment-oval-speech-bubble-with-text-lines"></i>
	            <?php comments_popup_link(
	            	esc_html__(' 0 Comments', 'spalisho'), 
	            	esc_html__(' 1 Comment', 'spalisho'), 
	            	' % '.esc_html__('Comments', 'spalisho'),
	            	'',
	          		esc_html__( 'Comment off', 'spalisho' )
	            ); ?>
	 		</li>
 		<?php } ?>

 	<?php if( $show_date || $show_cat || $show_author || $show_comment ){ ?>	
 		</ul>
 	<?php } ?>

	
    
<?php } ?>