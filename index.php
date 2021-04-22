<?php get_header(); ?>

<div id = "container-header-img" style = "background-image: url(<?php header_image(); ?>);background-position: center center;background-repeat: no-repeat;background-size: cover;">
    <div id = "header-img" class = "wrap" style = "padding: 8% 2% 7%;">
        <div id = "header-img-text" style = "color: white; max-width: 680px; margin: auto; text-align: center;">
            <h2 class = "header-title header-h2"><?php bloginfo('name'); ?></h2>
            <h3 class = "header-title header-h3"><?php bloginfo('description'); ?></h3>
        </div>
    </div>
</div>

<div id = "container-slide-bar" style = "padding:20px 0; position: relative;">
    <div class = "wrap">
        <div class = "swiper-container">
            <ul class = "swiper-wrapper" style = "display: flex; list-style: none;">
                <?php
                    $args = array(
                    'post_type' => 'post',
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'order'=>'DESC',
                    'posts_per_page' => 10,
                    );

                    $the_query = new WP_Query( $args );
                    if($the_query->have_posts()):
                        while($the_query->have_posts()): $the_query->the_post(); ?>
                            <li class = "swiper-slide">
                                <a href="<?php the_permalink(); ?>">
                                <figure class = "eyecatch">
                                    <?php if(has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail(array(486,290),array('class' => 'slide-pic')); ?>
                                    <?php else: ?>
                                        <img class = "slide-pic" src="<?php echo get_template_directory_uri(); ?>/img/popcorn-1433327_640.jpg" alt="" width = "486" height = "290">
                                    <?php endif; ?>
                                    <span class = "post-cate"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span>
                                </figure>
                                <div><?php echo get_the_title(); ?></div>
                                <div><?php echo getPostViews(); ?></div>
                                </a>
                            </li>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </ul>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<div id = "contents">
    <div id = "inner-contents" class = "wrap row">
        <div id = "posts-list" class = "col-lg-8 main-content">
            <div id = "index-title" class = "content-title"><h2>記事一覧</h2></div>
            <div id = "posts">
            <?php
                if(have_posts()) :
                    while(have_posts()) :
                        the_post();
            ?>
                <div class = "post"><a href="<?php the_permalink(); ?>">
                    <div class = "inner-post row">
                        <figure class = "eyecatch post-img col-5">
                            <?php if(has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(array(486,290)); ?>
                            <?php else: ?>
                                <img width = "486" height = "290" src="<?php echo get_template_directory_uri(); ?>/img/popcorn-1433327_640.jpg" alt="">
                            <?php endif; ?>
                            <span class = "post-cate"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span>
                        </figure>
                        <div class = "post-content col-7">
                            <div class = "post-title" style = "color: black"><h3><?php the_title(); ?></h3></div>
                            <div class = "post-meta" style = "color: #777">
                                <i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?>
                            </div>
                            <div class = "post-text" style = "color: #777"><p><?php echo wp_trim_words( get_the_content(), 100, '...' ); ?></p></div>
                        </div>
                    </div>
                </a></div>
            <?php
                endwhile;
                    else:
            ?>
            <p>記事はありません！</p>
            <?php endif; ?>

            </div>
            <div class = "navigation row">
                <div class = "prev col-6"><?php previous_posts_link(); ?></div>
                <div class = "next col-6"><?php next_posts_link(); ?></div>
            </div>
        </div>
        <div id = "sidebar" class = "col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>