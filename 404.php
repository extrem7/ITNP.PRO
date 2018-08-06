<?php get_header(); ?>
    <a href="<?= home_url() ?>" class="not-found">
        <? get_template_part('template-parts/triangles') ?>
        <div class="error">
            <h1>Страница не найдена</h1>
        </div>
    </a>

<?php get_footer(); ?>