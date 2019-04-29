<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 */
get_header();
?>

<div id="wrapper_container">
    <div id="wrapper" class="clearfix">
	
	<div class="row">
	
        <div id="content" class="col-sm-9">
		
		<h1 style="margin-bottom:20px; font-size:25px">Welcome to LabelLine's Blog</h1>
		
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 12,
				'paged' => $paged
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
                                    <div class="blog-image" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">

									</div>
                                    <?php endif; ?>
									<h2 class="blog-title-class"><?php echo the_title(); ?></h2>
                                    <?php echo the_excerpt(); ?>
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
				
				<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
				
				

            </div>
		
		 <div id="content" class="col-sm-3 blog-sidebar">
		
				<?php if (!dynamic_sidebar('main-sidebar')) : ?>
		<div class="widget-wrapper">
		
			<div class="widget-title"><?php _e('In Archive', 'responsive'); ?></div>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>

		</div><!-- end of .widget-wrapper -->
		<?php endif; //end of main-sidebar ?>
		 </div>
    </div>
</div>

    <?php get_footer(); ?>