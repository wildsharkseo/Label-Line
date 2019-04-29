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







<!-- end of #wrapper_container -->





<div id="sponsors">



<img src="https://labellineuk.co.uk/wp-content/uploads/2016/10/sponsor.jpg" alt="An image showcasing popular sponsors of Label Line UK">

</div>

<div id="footer_container">



  <div id="footer" class="clearfix">



    <?php responsive_footer_top(); ?>



    <div id="foot-1">



<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("foot-1") ) : ?>

<?php endif;?>   



    </div>



 <div id="foot-2">



<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("foot-2") ) : ?>

<?php endif;?>   



    </div>



    



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







document.write("© "+ update + " Label Line UK");







//--></script>| <a href="https://labellineuk.co.uk/wp-content/uploads/2016/11/PrivacyandCookiePolicies.docx">Cookies</a> | <a href="https://labellineuk.co.uk/wp-content/uploads/2016/11/WebTermsOctrevision.doc">Terms</a></div>



</div>



<!-- end #credits_container -->



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90346634-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-90346634-1');
</script>



<?php wp_footer(); ?>



</body></html>