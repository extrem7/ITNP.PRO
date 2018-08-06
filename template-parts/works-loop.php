<div class="works-overflow white-scroll">
    <div class="d-flex">
        <?
        $works = get_posts(['post_type' => 'work', 'posts_per_page' => -1]);
        foreach ($works as $post):
            $categories = '';
            foreach (wp_get_post_terms($post->ID, 'work_category') as $category) {
                $categories .= $category->term_id . ' , ';
            }
            ?>
            <a href="<? get_field('ссылка') ? the_field('ссылка') : the_permalink() ?>"
               target="<?= get_field('ссылка') ? '_blank' : '' ?>" class="item"
               data-category="<?= $categories ?>"
               style="background-image: url('<? the_post_thumbnail_url() ?>')">
                <div class="title">
                    <p><? the_title() ?></p>
                </div>
            </a>
        <? endforeach;
        wp_reset_query() ?>
    </div>
</div>
<div class="works-categories categories-list d-flex flex-wrap justify-content-around">
    <?
    $worksCategories = get_terms('work_category', ['hide_empty' => false, 'orderby' => 'id']);
    $active = true;
    foreach ($worksCategories as $category): ?>
        <a href="" class="<?= $active ? 'active' : '' ?>"
           data-category="<?= $category->term_id ?>"><?= $category->name ?></a>
        <? $active = false; endforeach; ?>
</div>