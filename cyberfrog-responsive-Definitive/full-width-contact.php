<?php







// Exit if accessed directly



if ( !defined('ABSPATH')) exit;







/**



 * Full Content Template



 *



   Template Name:  Full Width Contact



 *







 */







get_header(); ?>
<style>
.ajax-loader {
	display: none!Important
}
.post-title, .post-meta {
	display: none;
}
#wrapper form {
	width: 100%;
	float: left;
}
#wrapper #footer-con-r select, #wrapper #footer-con-r input[type="text"], #wrapper #footer-con-r input[type="password"], #wrapper #footer-con-r input[type="email"] {
	background: #ECECF0!important;
 !important;
	color: #444!important;
	border: none!important;
	font-size: 14px;
}
#wrapper #footer-con-l select, #wrapper #footer-con-l input[type="text"], #wrapper #footer-con-l input[type="password"], #wrapper #footer-con-l input[type="email"], #wrapper #footer-con-r textarea {
	background: #ECECF0!important;
 !important;
	color: #444!important;
	font-size: 14px;
	border: none!important;
	padding: 10px 12px;
}
#wrapper input.wpcf7-form-control.wpcf7-submit {
	background: #4E97BA!important;
	border: 1px solid #4E97BA;
	color: #ffffff;
	text-transform: uppercase;
	float: right;
	clear: both;
}
#wrapper input.wpcf7-form-control.wpcf7-submit:hover {
	background: transparent!important;
	color: #4E97BA;
}
textarea.wpcf7-form-control.wpcf7-textarea {
	height: 165px;
}
#wrapper .post-entry {
	max-width: 800px;
	margin: auto;
}
.one_fourth:first-child div p, .one_fourth:first-child div h3, .one_fourth:first-child div h4 {
	color: #79A5C9!important;
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
  </a>
  <div id="wrapper_container">
    <div id="contact-add"> </div>
    <div id="wrapper">
    <div class="social">
      <?php the_block('Connect with us')?></div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
