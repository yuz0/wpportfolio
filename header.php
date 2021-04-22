<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php wp_head(); ?>
</head>

<body>
<header id = "header">
    <div id = "menu-bar" class = "wrap" style = "height: 55px; margin: 0 auto; background-color: blueviolet;">
    <div class="remodal-bg">
        <a href="#modal-1"><i class="fas fa-bars"></i><span class = "navi-btn">menu</span></a>
    </div>
        <div id = "name-logo"><h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1></div>
        <div id = "header-menu" style = "float: right;">
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'header_menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )
            ); ?>
        </div>
    </div>
</header>