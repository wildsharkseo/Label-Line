<?php

// In your functions.php
class Shop_Menu extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        global $wp;
        $request_url = home_url($wp->request) . '/';
        $url = parse_url(home_url($wp->request));
        $pathParts = explode('/', $url['path']);
        
        if (strpos($permalink, $pathParts[3]) !== false && is_product_category()) {
            $output .= "<li class='has-sub active'>";
            if ($depth > 0) {
                if ($request_url == $permalink) {
                    $output .= '<a class="link-active-sub" href="' . $permalink . '">' . $title . '</a>';
                } else {
                    $output .= '<a href="' . $permalink . '">' . $title . '</a>';
                }
            } else {
                $output .= '<a class="set-active" href="' . $permalink . '">' . $title . '</a>';
            }
            change_submenu_class($menu);
        } else {
            $output .= "<li class='has-sub'>";
            if ($permalink == '#') {
                $output .= '<div>' . $title . '</div>';
            } else {
                $output .= '<a  href="' . $permalink . '">' . $title . ' <i class="fa fa-plus"></i></a>';
            }
        }
    }

}

function change_submenu_class($menu) {
    $menu = preg_replace('/ class="sub-menu" style="display:block"/', '', $menu);
    return $menu;
}

add_filter('wp_nav_menu', 'change_submenu_class');

