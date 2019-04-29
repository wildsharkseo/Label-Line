<?php















// Exit if accessed directly







if ( !defined('ABSPATH')) exit;















/**







 * Header Template







 *







 *







 * @file           header.php







 * @package        Responsive 







 * @author         Emil Uzelac 







 * @copyright      2003 - 2013 ThemeID







 * @license        license.txt







 * @version        Release: 1.3







 * @filesource     wp-content/themes/responsive/header.php







 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29







 * @since          available since Release 1.0







 */







?>

<!doctype html>

<!--[if !IE]>      <html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->

<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->

<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->

<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->

<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
<?php wp_title('&#124;', true, 'right'); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<script src="https://use.fontawesome.com/e81ac9255f.js"></script>
</head>

<body <?php body_class(); ?>>
<?php responsive_container(); // before container hook ?>
<div id="container" class="hfeed">
<div id="header_container">
  <?php responsive_header(); // before header hook ?>
  <div id="header">
    <div id="top-links">
    <a style="color:#fff; padding:5px 10px 5px 0px; float:left; font-size:28px;" href="tel:01515462222"><i class="fa fa-phone" aria-hidden="true" style="padding-right:10px;"></i>0151 546 2222</a>
      <div id="translate-box"> <i style="float:left;" class="fa fa-globe" aria-hidden="true"></i>
        <select name="forma" onchange="location = this.value;">
          <option value="#" style="display:none;">English</option>
          <option  value="https://labellineuk.co.uk/">English</option>
          <option value="https://labellineuk.co.uk/es">Spanish</option>
          <option value="https://labellineuk.co.uk/fr">French</option>
        </select>
      </div>
      <div id="social-top"> <span><a href="https://www.facebook.com/labellineuk/?fref=ts" target="_blank"><img src="https://labellineuk.co.uk/wp-content/uploads/2016/10/facebook.png" alt="A Facebook Icon" width="42" height="42"></a></span> <span><a href="https://twitter.com/labelline_uk" target="_blank"><img src="https://labellineuk.co.uk/wp-content/uploads/2016/10/twitter.png" width="42" height="42" alt="A Twitter Icon"></a></span> <span><a href="https://www.linkedin.com/company/label-line-international?trk=nav_account_sub_nav_company_admin" target="_blank"><img src="https://labellineuk.co.uk/wp-content/uploads/2016/10/linkin.png" width="42" height="42" alt="A Linkedin Icon"></a></span> <span><a href="mailto:sales@labellineuk.co.uk" target="_blank"><img src="https://labellineuk.co.uk/wp-content/uploads/2016/10/eamil.png" width="42" height="42" alt="A Email Icon"></a></span> </div>
      <div id="super-search" style="width:200px; float:right;  height:35px;">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("super-search") ) : ?>
        <?php endif;?>
      </div>
    </div>
    <?php responsive_header_top(); // before header content hook ?>
    <?php if (has_nav_menu('top-menu', 'responsive')) { ?>
    <?php wp_nav_menu(array(







				    'container'       => '',







					'fallback_cb'	  =>  false,







					'menu_class'      => 'top-menu',







					'theme_location'  => 'top-menu')







					); 







				?>
    <?php } ?>
    <?php responsive_in_header(); // header hook ?>
    <?php if ( get_header_image() != '' ) : ?>
    <div id="logo"> <a href="<?php echo home_url('/'); ?>"><img src="<?php header_image(); ?>" width="<?php if(function_exists('get_custom_header')) { echo get_custom_header() -> width;} else { echo HEADER_IMAGE_WIDTH;} ?>" height="<?php if(function_exists('get_custom_header')) { echo get_custom_header() -> height;} else { echo HEADER_IMAGE_HEIGHT;} ?>" alt="<?php bloginfo('name'); ?>" /></a> </div>
    <!-- end of #logo -->
    
    <?php endif; // header image was removed ?>
    <?php if ( !get_header_image() ) : ?>
    <div id="logo"> <span class="site-name"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
      <?php bloginfo('name'); ?>
      </a></span> <span class="site-description">
      <?php bloginfo('description'); ?>
      </span> </div>
    <!-- end of #logo -->
    
    <?php endif; // header image was removed (again) ?>
    <?php get_sidebar('top'); ?>
    <?php if (has_nav_menu('sub-header-menu', 'responsive')) { ?>
    <?php wp_nav_menu(array(







				    'container'       => '',







					'menu_class'      => 'sub-header-menu',







					'theme_location'  => 'sub-header-menu')







					); 







				?>
    <?php } ?>
    <?php responsive_header_bottom(); // after header content hook ?>
  </div>
  
  <!-- end of #header -->
  
  <?php responsive_header_end(); // after header container hook ?>
</div>
<div id="main-box">
  <div id="main-con">
    <?php wp_nav_menu(array(







				    'container'       => 'div',







						'container_class'	=> 'main-nav',







						'fallback_cb'	  =>  'responsive_fallback_menu',







						'theme_location'  => 'header-menu')







					); 







				?>
  </div>
</div>
<?php responsive_in_wrapper(); // wrapper hook ?>
