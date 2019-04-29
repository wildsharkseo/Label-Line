<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/index.php
 * @link           http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @since          available since Release 1.0
 */
 
 get_header();

?>

<div id="wrapper_container">
    <div id="wrapper" class="clearfix">
        <div id="content" class="grid col-620">
            <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 18
            );

            $query = null;
            $query = new WP_Query($args);

            if ($query->have_posts()) {

                $i = 0;
                while ($query->have_posts()) : $query->the_post();
                    // modified to work with 3 columns
                    // output an open <div>
                    if ($i % 3 == 0) {
                        ?> 

                        <div class="row">

                            <?php
                        }
                        ?>

                        <div class="col-md-4">
                            <div class="my-inner">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div style="background-image:url('<?php the_post_thumbnail('thumbnail'); ?>')" title="<?php the_title_attribute(); ?>" >
                                        </a>
                                    <?php endif; ?>
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>  

                            <?php
                            $i++;
                            if ($i != 0 && $i % 3 == 0) {
                                ?>
                            </div>
                            <div class="clearfix"></div>

                        <?php }
                        ?>

                        <?php
                    endwhile;
                }
                wp_reset_query();
                ?>

            </div>
        </div>
    </div>

    <?php get_sidebar(); ?>
    <?php get_footer(); ?>