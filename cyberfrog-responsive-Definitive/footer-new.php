<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

/* 
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
?>


<div id="footer_container">
  <div id="footer" class="clearfix">
    <?php responsive_footer_top(); ?>
    <div id="footer-wrapper">
      <h1>jadhghfajfjf </h1>
    </div>
    <!-- end #footer-wrapper -->
    
    <?php responsive_footer_bottom(); ?>
  </div>
  
  <!-- end #footer -->
  <?php responsive_footer_after(); ?>
</div>
<!-- end #footer_container -->
<div id="credits_container">
  <div id="credits" class="clearfix"><script type="text/javascript"><!--

    
copyright=new Date();
update=copyright.getFullYear();

document.write("©2012 - "+ update + " The Website Owner");

//--></script> 
</div>
<!-- end #credits_container -->

<?php wp_footer(); ?>
</body></html>