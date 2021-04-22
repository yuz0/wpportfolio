<footer>
    <div id = "footer-contents" class = "wrap" style = "background-color:#666; color:#ddd; padding: 30px 20px 40px 20px">
        <div id = "footer-top" class = "row">
            <div class = "col-sm-6 col-lg-4">
                <div class = "footer-item">
                    <h4>Tags</h4>
                    <ul id = "tags-list">
                        <?php
                            $term_list = get_terms('post_tag');
                            $result_list = [];
                            foreach ($term_list as $term) {
                            $u = (get_term_link( $term, 'post_tag' ));
                            echo "<li class = 'tag'><a href='".$u."'>".$term->name."</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class = "col-lg-4">
            <!-- <?php dynamic_sidebar('footer-widgets'); ?> -->
            <!-- カテゴリーとアーカイブ固定 or ウィジェット -->
                <div class = "footer-item">
                    <h4>Category</h4>
                    <select name="select" onChange="location.href=value;">
                        <option value="<?php echo home_url(); ?>/blog/">すべて</option>
                        <?php
                        $categories = get_categories();
                        foreach($categories as $category) {
                            $categories = get_the_category($post->ID);
                            $slug = $categories[0]->term_id;
                            // 3. if文でカテゴリーページの場合 & 現在表示されているページと同じカテゴリーの場合「selected」属性を付与する
                            if(is_category() && $slug == $category->term_id){
                                echo '<option value="'.get_category_link($category->term_id).'" selected>'.$category->name.'</option>';
                            }else{
                                echo '<option value="'.get_category_link($category->term_id).'">'.$category->name.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class = "footer-item">
                    <h4>Archive</h4>
                    <select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
                        <option value=""><?php echo attribute_escape(__('Select Month')); ?></option> 
                        <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
                    </select>
                </div>
            </div>
            <div class = "col-lg-4">
                <?php dynamic_sidebar('about-me'); ?>
            </div>
        </div>
        <div id = "footer-bottom" style = "font-size: 12px;">
            <div id = "footer-menu-area"><?php wp_nav_menu(
                array(
                    'theme_location' => 'footer_pages_menu',
                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )
            ); ?></div>
            <div id = "copyright">Copyright © <?php echo date('Y');?> <?php bloginfo('name'); ?> All Rights Reserved.</div>
        </div>
    </div>
</footer>

<div class="remodal" data-remodal-id="modal-1">
    <button data-remodal-action="close" class="remodal-close">
        <span class = "close-btn">close</span>
    </button>
    <div id = "mobile-menu"><?php dynamic_sidebar('mobile-menu-widgets'); ?></div>
    <button data-remodal-action="close" class="remodal-close">
        <span class = "close-btn">close</span>
    </button>
</div>

<?php wp_footer(); ?>
</body>

</html>