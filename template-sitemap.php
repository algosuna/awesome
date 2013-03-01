<?php 
/*
	Template Name: Automatic Sitemap
	Description: A Sitemap page that stays up to date when new pages or blog posts are added. Good for users/SEO
*/
?>
<?php get_header(); ?>
    
    <div id="content">

<?php
//SAFETY NET: make xure the function for breadcrumbs exists
//ALWAYS do this around plugins or custom function calls
if(function_exists('dimox_breadcrumbs')):
    dimox_breadcrumbs();
endif;
?>
    	
	<?php 
	//THE LOOP.
	if( have_posts() ): 
		while( have_posts() ):
		the_post(); ?>
	
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
            <h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
				<?php the_title(); ?> 
				</a>
			</h2>            
            
            <div class="entry-content">
                <div class="onethird">
					<h3>Pages</h3>
					<ul>
						<?php wp_list_pages(array(
							'title_li' => ''
						)); ?>
					</ul>
				</div>
				<div class="onethird">
					<h3>Blog Posts</h3>
					<ul>
						<?php wp_get_archives(array(
							'type' => 'postbypost'
						)); ?>
					</ul>
				</div>
				<div class="onethird">
					<?php 
					//get the correct path to the rss icon
					$feed_image = get_bloginfo('template_directory') . '/images/icon12_rss.png'; ?>
					<h3>RSS Feeds</h3>
					<ul class="feeds">
						<li><a href="<?php bloginfo('rss2_url'); ?>">Main Posts Feed <img src="<?php echo $feed_image; ?>" /></a></li>
						<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments Feed <img src="<?php echo $feed_image; ?>" /></a></li>
					</ul>
					
					<h3>Categories</h3>
					<ul class="feeds">
						<?php		
						wp_list_categories(array(
							'title_li' => '',
							'feed_image' => $feed_image
						)); ?>
					</ul>
				</div>
            </div>
       
        
		<?php
		//show the comment list and form (only appears on singular views)
		 comments_template();  
		?>
		 </article><!-- end post -->
      <?php 
	  endwhile;
	  else: ?>
	  <h2>Sorry, no posts found</h2>
	  <?php endif; //END OF LOOP. ?>
	          
        
    </div><!-- end content -->
    

<?php get_footer(); ?>  