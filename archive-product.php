<?php get_header(); ?>
    
    <div id="content">
	
	<?php 
	//make sure the function for breadcrumbs exists
	//ALWAYS do this around plugin or custom function calls
	if(function_exists('dimox_breadcrumbs')):
		dimox_breadcrumbs(); 
	endif;
	?>
	
	<?php 
	//THE LOOP.
	if( have_posts() ): ?> 
		
		<h2 class="archive-title"><?php post_type_archive_title(); ?></h2>
		
		<?php while( have_posts() ):
		the_post(); ?>
	
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
            
			 <?php 
			 // (size, attributes)
			 //valid sizes: thumbnail, medium, large			 
			 the_post_thumbnail('thumbnail', array(
			 	'class' => 'thumb'
			 ));  ?>   
			
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
				<?php the_title(); ?> 
				</a>
			</h2>    
			
            <div class="entry-content">
                <?php the_excerpt();?>
				<?php 
				// show one custom field (post ID, name of field, show a single value)
				echo get_post_meta( $post->ID, 'Size', true ); ?>	
				<?php 
				// show one custom field (post ID, name of field, show a single value)
				echo get_post_meta( $post->ID, 'Price', true ); ?>	
						
            </div>       
        
		 </article><!-- end post -->
      <?php 
	  endwhile;
	  else: ?>
	  <h2>Sorry, no posts found</h2>
	  <?php endif; //END OF LOOP. ?>
	          
        
        <div id="nav-below" class="pagination"> 
           <?php 
		   //check to see if the pagenavi plugin is active
		   if( function_exists('wp_pagenavi') ):
		   		wp_pagenavi();
		   else:
		   ?>		   
			   <?php next_posts_link('&laquo; Older Posts'); ?>				
			   <?php previous_posts_link('Newer Posts &raquo;'); ?>
			   
			<?php endif; ?>
		  	   
        </div><!-- end #nav-below --> 
        
    </div><!-- end content -->
<?php get_footer(); ?>  