<?php get_header(); ?>

<?php
// 記事のビュー数を更新(ログイン中・ロボットによる閲覧時は除く)
    if (!is_user_logged_in() && !is_robots()) {
        setPostViews(get_the_ID());
    }
?>

<?php
    if(have_posts()):
        while(have_posts()):
            the_post()
?>

<div id = "see-where" class = "wrap">
    <ul>
        <li><a href="<?php echo home_url('/'); ?>"><i class="fas fa-home" style="color: #1BB4D3;"></i>HOME</a></li>
        <li><?php the_category(' , ') ?></li>
        <li><?php the_title(); ?></li>
    </ul>
</div>

<div id = "contents">
    <div id = "inner-contents" class = "wrap row">
        <div id = "the-single-post" class = "col-lg-8 main-content">
            <div class = "meta-data" style = "display:flex; padding-bottom:1em;">
                <div class = "meta-date" style = "padding-right:1em;"><i class="far fa-calendar-alt"></i><?php the_date(); ?></div>
                <div class = "meta-modified"><i class="fas fa-redo-alt"></i><?php the_modified_date(); ?></div>
            </div>
            <div class = "content-title">
                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            </div>
            <div class = "post-thumbnail-img" style = "padding-bottom:2em">
                <?php if(has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(1280,700); ?>
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/popcorn-1433327_640.jpg" alt="" width = "1280" height = "700">
                <?php endif; ?>
            </div>
            <div id = "post-body" style = "padding-bottom: 2em;"><?php the_content(); ?></div>
            <div class = "navigation row">
                <div class = "prev col-6"><?php previous_post_link(); ?></div>
                <div class = "next col-6"><?php next_post_link(); ?></div>
            </div>
        </div>
        <?php endwhile; else: ?>
        <div>記事はありません</div>
        <?php endif; ?>
        <div id = "sidebar" class = "col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>