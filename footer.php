</div><!-- end wrapper -->

<footer class="clearfix" id="colophon" role="contentinfo">
    <div class="widget-container"> 
	
		<?php dynamic_sidebar('Footer Area'); ?>
		       
        <small>&copy; 2012 <?php bloginfo('name'); ?></small>        
    </div>
</footer><!-- end footer -->

<?php 
//must call wp_footer right before </body> for JS and plugins to run!
wp_footer();  ?>
</body>
</html>