<?php get_header(); ?>

<?php
    if(have_posts()):
        while(have_posts()):
            the_post()
?>

<div id = "contents" style = "background-color:#eee">
    <div id = "inner-contents" class = "wrap row">
        <div id = "the-page-post" class = "col-lg-8 main-content" style = "background-color:#fff">
            <div class = "content-title">
                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            </div>
            <div id = "post-body"><?php the_content(); ?></div>
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