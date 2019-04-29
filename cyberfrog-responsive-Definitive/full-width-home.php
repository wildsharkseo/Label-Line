<?php



// Exit if accessed directly

if ( !defined('ABSPATH')) exit;



/**

 * Full Content Template

 *

   Template Name:  Full Width Home

 *



 */



get_header(); ?>
<style>
#home-con-r {
	width: 30%;
	float: left;
	margin-left: 1.5%;
	margin-right: 1.5%;
}
#home-con-c {
	width: 30%;
	float: left;
	margin-left: 1.5%;
	margin-right: 1.5%;
}
#home-con-l {
	width: 30%;
	float: left;
	margin-left: 1.5%;
	margin-right: 1.5%;
}
.post-title, .post-meta {
	display: none;
}
#wrapper input.wpcf7-form-control.wpcf7-submit {
	background: #4E97BA!important;
	border: 1px solid #4E97BA;
	color: #ffffff;
	text-transform: uppercase;
	float: right;
	clear: both;
	margin-left: 2.5%;
	padding: 10px 20px;
	margin-right: 2.5%;
}
#wrapper input.wpcf7-form-control.wpcf7-submit:hover {
	background: transparent!important;
	color: #4E97BA;
}
textarea.wpcf7-form-control.wpcf7-textarea {
	height: 100px;
}
.one_third a {
	background: #4F97B9;
	padding: 10px;
	text-transform: uppercase;
	color: #fff;
}
</style>

<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>
<div id="top-image" style="background: url(<?php echo $src[0]; ?> ) ;">
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
  </div>
</div>
<?php get_footer(); ?>
