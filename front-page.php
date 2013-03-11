<?php get_header(); ?>

	<section id="slider">
		 <?php the_post_thumbnail('awesome-frontpage');  ?>  
	</section>

    
    <div id="content">
	
		<blockquote class="home-quote">
			<p>Quote Goes Here</p>
			<cite>&ndash; Source goes here</cite>
		</blockquote>
		
	
	<?php 
	//THE LOOP.
	if( have_posts() ): 
		while( have_posts() ):
		the_post(); ?>
	
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
        	<div class="entry-content">
                <?php the_content(); ?>
            </div>
		</article><!-- end post -->
      <?php 
	  endwhile;
	  else: ?>
	  <h2>Sorry, no posts found</h2>
	  <?php endif; //END OF LOOP. ?>
        
    </div><!-- end content -->
    
<?php get_sidebar('frontpage'); //includes sidebar-frontpage.php ?> 
<?php get_footer(); ?>  