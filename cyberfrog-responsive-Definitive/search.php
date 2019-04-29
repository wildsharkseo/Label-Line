<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/search.php
 * @link           http://codex.wordpress.org/Theme_Development#Search_Results_.28search.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>
<style>
#recent-posts-2 {
    background: #2f7194!important;
    color: #fff;

    padding: 20px;
}

#categories-2 {
    background: #2f7194!important;
    color: #fff;
    margin-top: 20px;
    padding: 20px;
}
.read-more{display:none!Important}.navigation{display:none!important;}

</style>
<div id="wrapper_container">
<div id="wrapper">
<div id="content-search" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

<?php if (have_posts()) : ?>

    <?php get_template_part( 'loop-header' ); ?>

		<?php while (have_posts()) : the_post(); ?>  
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>
                
                <?php get_template_part( 'post-meta' ); ?>
                
                <div class="post-entry">
                    <?php the_excerpt(); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>
				               
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content-search -->

<?php get_sidebar(); ?>

</div></div>
<?php get_footer(); ?>
