<?php
function custom_enqueue(){
  wp_deregister_script('jquery');

  wp_enqueue_style('bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css');
  wp_enqueue_style('swiper_css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
  wp_enqueue_style('remodal_css', 'https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.min.css');
  wp_enqueue_style('remodal_def_css', 'https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal-default-theme.min.css');
  wp_enqueue_style('style', get_stylesheet_uri());

  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
  wp_enqueue_script('swiper_js', 'https://unpkg.com/swiper/swiper-bundle.min.js');
  wp_enqueue_script('remodal_js', 'https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.min.js');
  wp_enqueue_script('my_js', get_template_directory_uri() .'/forswiper.js',array('common'),'feb2021',true);
  wp_enqueue_script('script_jquery', get_template_directory_uri() .'/effect.js',array('jquery'),'feb2021',true);
}
add_action('wp_enqueue_scripts', 'custom_enqueue');


register_nav_menu('header_menu', 'ヘッダーメニュー');
register_nav_menu('footer_pages_menu', 'フッター固定ページ用メニュー');

add_theme_support('post-thumbnails');

function my_theme_widgets_init(){
  register_sidebar(
    array(
      'name' => 'メインサイドバー',
      'id' => 'main-sidebar',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    )
  );
  register_sidebar(
    array(
      'name' => 'フッター 一番右のエリア 自己紹介用',
      'id' => 'about-me',
      'before_widget' => '<div class="footer-item footer-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
    )
  );
  register_sidebar(
    array(
      'name' => 'モバイル用メニュー',
      'id' => 'mobile-menu-widgets',
      'before_widget' => '<div class="menu-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    )
  );
}
add_action( 'widgets_init', 'my_theme_widgets_init' );

function wphead_cb() {
  echo '<style type="text/css">';
  echo '.header-h2, .header-h3 { color: #'.get_header_textcolor().' }';
  echo '</style>';
}
$custom_header = array(
  'random-default' => false,
  'flex-height' => true,
  'flex-width' => true,
  'default-text-color' => '000',
  'header-text' => true,
  'uploads' => true,
  'wp-head-callback' => 'wphead_cb',
  'default-image' => get_bloginfo('template_url').'/img/popcorn-1433327_640.jpg',
  'admin-head-callback'    => '', 
  'admin-preview-callback' => '',
);
add_theme_support('custom-header', $custom_header);

//アクセス数順swiper用
function setPostViews() {
  $post_id = get_the_ID();
  $custom_key = 'post_views_count';
  $view_count = get_post_meta($post_id, $custom_key, true);  //現在のビュー数を取得
  //すでにメタデータがあるかどうかで処理を分ける
  if ($view_count === '') {
      delete_post_meta($post_id, $custom_key);
      add_post_meta($post_id, $custom_key, '0');
  } else {
      $view_count++;
      update_post_meta($post_id, $custom_key, $view_count);
  }
}
function getPostViews($post_id = null) {
  $post_id = $post_id ? $post_id : get_the_ID();
  $custom_key = 'post_views_count';
  $view_count = get_post_meta($post_id, $custom_key, true);
  if ($view_count === '') {
      //まだメタデータが存在していなければ
      delete_post_meta($post_id, $custom_key);
      add_post_meta($post_id, $custom_key, '0');
      $view_count = 0;
  }
  return $view_count.' Views';
}
?>