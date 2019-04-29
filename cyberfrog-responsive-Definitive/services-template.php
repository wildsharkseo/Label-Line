<?php
/**
 * Template Name: Services Template
 */
get_header();

$args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'post_parent' => $post->ID,
    'order' => 'ASC',
    'orderby' => 'menu_order'
);

$parent = new WP_Query($args);

$numberOfColumns = 3;
$bootstrapColWidth = 12 / $numberOfColumns;
$arrayChunks = array_chunk($parent->posts, $numberOfColumns);

?>

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

<div id="wrapper_container" class="box-sizing-services">
    <div id="wrapper" class="clearfix">
		<div class="spacer"></div>
		<div class="spacer"></div>
        <div class="row">
            <div class="col-sm-12">
                <?php
                foreach ($arrayChunks as $items) {
                    echo '<div class="row">';
                    foreach ($items as $item) {

                        $pageID = $item->ID;
                        $title = $item->post_title;
                        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($pageID));
                        $perma = get_permalink($item->ID);

                        echo '<div class="col-md-' . $bootstrapColWidth . '">';
                        ?>
                        <a href="<?php echo $perma; ?>">
                            <h2 class="featured-home-link"><?php echo $title; ?></h2>
                            <div class="outer-div"><div class="inner-div" style="background-image:url(<?php echo $feat_image; ?>)"></div></div>
                        </a>
                        <?php
						echo '<div class="spacer"></div>';
                        echo '</div>';
											
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
           </div>
    </div>

<?php get_footer(); ?>

