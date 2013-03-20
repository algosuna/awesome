<?php get_header(); ?>

<?php
if(function_exists('rad_slider')):
	rad_slider();
else:
	the_post_thumbnail('awesome-frontpage');
endif;
?>

<div id="content">

	<?php
    //get the values from our options plugin
    $options=get_option('rad_options');
    //show/hide the quote based on the settings
    if($options['show-quote']==1):
    	?>

    	<blockquote class="home-quote">
			<p><?php echo $options['quote'];?></p>
			<cite>&ndash; <?php echo $options['quote-source'];?></cite>
		</blockquote>

	<?php endif; ?>

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
	else:
		?>

		<h2>Sorry, no posts found</h2>

	<?php endif; //END OF LOOP. ?>

</div><!-- end content -->
    
<?php get_sidebar('frontpage'); //includes sidebar-frontpage.php ?> 
<?php get_footer(); ?>  