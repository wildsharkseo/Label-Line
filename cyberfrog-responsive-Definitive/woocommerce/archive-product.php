
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
?>

<div id="wrapper_container">
    <div id="wrapper" class="clearfix">
        <div id="content-full">

            <?php
            do_action('woocommerce_before_main_content');
            ?>

            <?php
            echo '<div class="grid col-220 fit" id="clone-menu">';

            if (!wp_is_mobile()) {
                wp_nav_menu(array(
                    'theme_location' => 'shop-menu',
                    'container_id' => 'cssmenu',
                    'menu_class' => '',
                    'walker' => new Shop_Menu()
                ));
            } else {
                ?>
                <div class="btn btn-success btn-cons" id="toggle-button">Shop Filters </div>
                <?php
            }

            dynamic_sidebar('sidebar-1');

            echo '</div>';
            echo '<div class="grid col-700 fit">';
            ?>

            <header class="woocommerce-products-header">
                <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                    <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                <?php endif; ?>

                <?php
                /**
                 * Hook: woocommerce_archive_description.
                 *
                 * @hooked woocommerce_taxonomy_archive_description - 10
                 * @hooked woocommerce_product_archive_description - 10
                 */
                do_action('woocommerce_archive_description');
                ?>
            </header>

            <?php
            do_action('woocommerce_before_shop_loop');

            if (woocommerce_product_loop()) {

                woocommerce_product_loop_start();

                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         *
                         * @hooked WC_Structured_Data::generate_product_data() - 10
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');
                    }
                }

                woocommerce_product_loop_end();
            } else {
                do_action('woocommerce_no_products_found');
            }

            echo '</div>';

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');



            /**
             * Hook: woocommerce_after_main_content.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action('woocommerce_after_main_content');
            ?>


        </div>
    </div>
</div>

<div class="menu-wrap">
    <div class="menu-sidebar">
        <div class="btn btn-danger" id="toggle-button-close">Close</div>
        <div style="height:30px;width:100%;"></div>
        <?php
        if (wp_is_mobile()) {
            wp_nav_menu(array(
                'theme_location' => 'shop-menu',
                'container_id' => 'cssmenu',
                'menu_class' => '',
                'walker' => new Shop_Menu()
            ));
        }
        ?>
    </div>
</div>

<script>
    (function ($) {
        $(document).ready(function () {

            $('#cssmenu li.active').addClass('open').children('ul').show();

            var $toggleButton = $('#toggle-button'),
                    $menuWrap = $('.menu-wrap');

            $toggleButton.on('click', function () {
                $(this).toggleClass('button-open');
                $menuWrap.toggleClass('menu-show');
            });
            
            $('#toggle-button-close').on('click', function () {
                 $menuWrap.toggleClass('menu-show');
                });


            $('#cssmenu li.has-sub > div').on('click', function () {

                var element = $(this).parent('li');
                if (element.hasClass('open')) {
                    element.removeClass('open');
                    element.find('li').removeClass('open');
                    element.find('ul').slideUp(200);
                } else {
                    element.addClass('open');
                    element.children('ul').slideDown(200);
                    element.siblings('li').children('ul').slideUp(200);
                    element.siblings('li').removeClass('open');
                    element.siblings('li').find('li').removeClass('open');
                    element.siblings('li').find('ul').slideUp(200);
                }

            });
            
            jQuery('#cssmenu').find('.link-active-sub').parent().parent('ul').show();
            jQuery('#cssmenu').find('.link-active-sub').parent().parent('ul').parent('li').addClass('open');


        });
    })(jQuery);
</script>

<?php
get_footer('shop');
