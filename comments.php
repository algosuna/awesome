<?php
//check to see if the post is password protected, if so, stop loading this file
if( post_password_required() ):
	echo 'Enter the password to view the comments';
	return; //stop the rest of this file from loading
endif;

//break up the complete list of comments into comments, trackbacks and pingbacks
$comments_by_type = &separate_comments($comments);
//variables to count comments and trackbacks
$comment_count = count($comments_by_type['comment']);
$trackback_count = count($comments_by_type['pings']); //tracks and pings
 ?>
<section id="comments">
	<h3 id="comments-title">
	<?php echo $comment_count; ?> Comments so far 
	
	<?php if( $trackback_count >= 1 ): ?>
	| <a href="#trackbacks"><?php echo $trackback_count; ?> Mentions</a>
	<?php endif; ?>
	 
	| <a href="#respond">Leave a Comment</a></h3>
	
	<div class="pagination">
		<?php previous_comments_link(); ?>
		<?php next_comments_link(); ?>
	</div>
	
	<div class="commentlist">
		<?php wp_list_comments(array(
			'type' => 'comment',
			'avatar_size' => 70,
			'style' => 'div',
			'callback' => 'awesome_comment' //define in functions.php
		)); ?>
	</div>
	
	<div class="pagination">
		<?php previous_comments_link(); ?>
		<?php next_comments_link(); ?>
	</div>
	
	<?php comment_form(); ?>
</section>


<section id="trackbacks">
	<h3>Sites that Link Here</h3>
	<ol>
		<?php wp_list_comments(array(
			'type' => 'pings',
			'page' => 1, //override comment pagination. "stay on page 1"
			'per_page' => 100
		)); ?>
	</ol>

</section>