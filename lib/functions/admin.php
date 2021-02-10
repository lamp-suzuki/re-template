<?php
function override_widget_categories()
{
    class WP_Widget_Categories_Taxonomy extends WP_Widget_Categories
    {
        private $taxonomy = 'category';
        public function widget($args, $instance)
        {
            if (!empty($instance['taxonomy'])) {
                $this->taxonomy = $instance['taxonomy'];
            }
            add_filter('widget_categories_dropdown_args', array( $this, 'add_taxonomy_dropdown_args' ), 10);
            add_filter('widget_categories_args', array( $this, 'add_taxonomy_dropdown_args' ), 10);
            parent::widget($args, $instance);
        }
        public function update($new_instance, $old_instance)
        {
            $instance = parent::update($new_instance, $old_instance);
            $taxonomies = $this->get_taxonomies();
            $instance['taxonomy'] = 'category';
            if (in_array($new_instance['taxonomy'], $taxonomies)) {
                $instance['taxonomy'] = $new_instance['taxonomy'];
            }
            return $instance;
        }
        public function form($instance)
        {
            parent::form($instance);
            $taxonomy = 'category';
            if (!empty($instance['taxonomy'])) {
                $taxonomy = $instance['taxonomy'];
            }
            $taxonomies = $this->get_taxonomies(); ?>
            <p>
                <label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Taxonomy:'); ?></label><br />
                <select id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>">
                    <?php foreach ($taxonomies as $value) : ?>
                    <option value="<?php echo esc_attr($value); ?>"<?php selected($taxonomy, $value); ?>><?php echo get_taxonomy($value)->label; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <?php
        }
        public function add_taxonomy_dropdown_args($cat_args)
        {
            $cat_args['taxonomy'] = $this->taxonomy;
            return $cat_args;
        }
        private function get_taxonomies()
        {
            $taxonomies = get_taxonomies(array(
                'public' => true,
            ));
            return $taxonomies;
        }
    }
    unregister_widget('WP_Widget_Categories');
    register_widget('WP_Widget_Categories_Taxonomy');
}
add_action('widgets_init', 'override_widget_categories');

// サムネイル列の追加
function add_posts_columns($columns, $post_type)
{
    if ($post_type === 'faq') {
        $columns = [
            'cb' => '<input type="checkbox" />',
            'title' => 'タイトル',
            'date' => '日時',
            'author' => '作成者',
        ];
    } elseif ($post_type === 'works') {
        $columns = [
            'cb' => '<input type="checkbox" />',
            'thumbnail' => 'アイキャッチ',
            'title' => 'タイトル',
            'taxonomy-workscat' => 'カテゴリー',
            'date' => '日時',
            'author' => '作成者',
        ];
    } elseif ($post_type === 'staff') {
        $columns = [
            'cb' => '<input type="checkbox" />',
            'thumbnail' => '写真',
            'title' => '名前',
            'date' => '日時',
            'author' => '作成者',
        ];
    } elseif ($post_type === 'review' || $post_type === 'area') {
        $columns = [
            'cb' => '<input type="checkbox" />',
            'title' => 'タイトル',
            'date' => '日時',
            'author' => '作成者',
        ];
    } else {
        $columns = [
            'cb' => '<input type="checkbox" />',
            'thumbnail' => 'アイキャッチ',
            'title' => 'タイトル',
            'categories' => 'カテゴリー',
            'tags' => 'タグ',
            'date' => '日時',
            'author' => '作成者',
        ];
    }
    return $columns;
}
add_filter('manage_posts_columns', 'add_posts_columns', 10, 2);

function custom_posts_columns_thumbnail($column_name, $post_id)
{
    if ('thumbnail' === $column_name) {
        $thumb_id  = get_post_thumbnail_id($post_id);
        if ($thumb_id) {
            $thumb_img = wp_get_attachment_image_src($thumb_id, 'medium');
            echo '<img src="',$thumb_img[0],'" width="100px">';
        } else {
            echo 'なし';
        }
    }
}
add_action('manage_posts_custom_column', 'custom_posts_columns_thumbnail', 10, 2);

//メニューの削除
function remove_menus()
{
    // remove_menu_page('index.php'); //ダッシュボード
    //remove_menu_page( 'edit.php' ); //投稿メニュー
    // remove_menu_page('upload.php'); //メディア
    // remove_menu_page('edit.php?post_type=page'); //ページ追加
    remove_menu_page('edit-comments.php'); //コメントメニュー
    // remove_menu_page('themes.php'); //外観メニュー
    // remove_menu_page('plugins.php'); //プラグインメニュー
    // remove_menu_page('tools.php'); //ツールメニュー
    // remove_menu_page('options-general.php'); //設定メニュー
}
add_action('admin_menu', 'remove_menus');
