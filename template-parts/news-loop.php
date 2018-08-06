<div class="news-overflow white-scroll">
    <div class="row">
        <?
        $news = get_posts(['post_type' => 'post', 'posts_per_page' => -1]);
        foreach ($news as $post):
            $categories = '';
            foreach (wp_get_post_categories($post->ID) as $category) {
                $categories .= $category . ' , ';
            }
            ?>
            <div class="col-md-6 item" data-category="<?= $categories ?>">
                <a href="<? the_permalink() ?>" class="news-item"
                   style="background-image: url('<? the_post_thumbnail_url() ?>')">
                    <div class="title">
                        <p><? the_title() ?></p>
                    </div>
                </a>
            </div>
        <? endforeach;
        wp_reset_query() ?>
    </div>
</div>
<div class="news-categories categories-list d-flex flex-wrap justify-content-around">
    <?
    $categories = get_terms('category', ['hide_empty' => false, 'orderby' => 'id']);
    $active = true;
    foreach ($categories as $category): ?>
        <a href="" class="<?= $active ? 'active' : '' ?>"
           data-category="<?= $category->term_id ?>"><?= $category->name ?></a>
        <? $active = false; endforeach; ?>
</div>
