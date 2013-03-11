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
  if( have_posts() ): 
    while( have_posts() ):
      the_post();
  ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
    <?php
    // (size, attributes)
    //valid sizes: thumbnail, medium, large       
    the_post_thumbnail('medium', array(
      'class' => 'image alignright'
    )); 
    ?>

    <section class="product-info">
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h2>

      <?php
      //show all custom field data
      the_meta();
      ?>

      <?php
      //show the BRAND this product is in (post id, tax slug, before, between, after)
      the_terms( $post->ID, 'brand', '<h3>Brand:</h3><p>', '<br />', '</p>' );
      ?>

      <?php
      //show the FEATURE this product is in
      the_terms($post->ID,'features','<h3>Features:</h3><p>','<br />','</p>');
      ?>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

    </section>

    <div class="pagination">
      <?php previous_post_link('%link', '&laquo; Earlier: %title'); ?>
      <?php next_post_link('%link', 'Later: %title &raquo;'); ?>
    </div>

  </article><!-- end post -->

  <?php
  endwhile;
  else: ?>
  <h2>Sorry, no posts found</h2>

<?php endif; //END OF LOOP. ?>

</div><!-- end content -->

<?php get_sidebar(); ?> 
<?php get_footer(); ?>  