<?php



// Exit if accessed directly

if ( !defined('ABSPATH')) exit;



/**

 * Full Content Template

 *

   Template Name:  Full Width About Map

 *



 */



get_header(); ?>
<style>
.post-title, .post-meta {
	display: none;
}
.post-entry {
	max-width: 50%;
}
.post-entry{min-height:600px;}
#wrapper_container {
	background-image: url('<?php bloginfo('template_directory'); ?>/core/images/map3.png');
	background-repeat: no-repeat;
	background-position: top right;
	background-size:45%;
}
#wrapper {
	background: transparent;
	min-height: 700px
}
</style>
<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>
<div id="top-image" style="background: url(<?php echo $src[0]; ?> );">

<div id="top-image-text">
  <div id="text-box">
<?php the_block('Top Image Text')?>
</div>
</div>


</div>
<div id="wrapper_container">
  <div id="wrapper" class="clearfix">
    <div id="content-full" class="grid col-940">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'loop-header' ); ?>
      <?php responsive_entry_before(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php responsive_entry_top(); ?>
        <?php get_template_part( 'post-meta-page' ); ?>
        <div class="post-entry">
          <?php the_content(__('Read more &#8250;', 'responsive')); ?>
          <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
        </div>
        <!-- end of .post-entry -->
        
        <?php 

		endwhile; 



		get_template_part( 'loop-nav' ); 



	else : 



		get_template_part( 'loop-no-posts' ); 



	endif; 

	?>
      </div>
    </div>
    <div id="about-block-2">
      <?php the_block('Second Block')?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
