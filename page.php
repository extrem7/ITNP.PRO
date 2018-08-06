<? get_header();
?>
    <section class="section">
        <?  get_template_part('template-parts/triangles') ?>
        <div class="content container">
            <img src="<?= path() ?>img/itnp-logo.png" alt="" class="it-logo">
            <h1 class="section-title"><? the_title() ?></h1>
            <div class="news-overflow white-scroll">
                <div class="typography">
                    <?= apply_filters('the_content', get_post_field('post_content', $id)); ?>
                </div>
            </div>
        </div>
    </section>
    <div id="fp-nav" class="fp-show-active left" style="margin-top: -115px;">
        <ul>
            <li><a href="#empty" class=""><span></span></a>
                <div class="fp-tooltip left">empty</div>
            </li>
            <li><a href="/#main" class=""><span></span></a>
                <a href="/#main" class="fp-tooltip left">
                    <div class="home"></div>
                </a>
            </li>
            <li><a href="/#about"><span></span></a>
                <a href="/#about" class="fp-tooltip left">О нас</a>
            </li>
            <li><a href="/#wwd"><span></span></a>
                <a href="/#wwd" class="fp-tooltip left">Что мы решаем?</a>
            </li>
            <li><a href="/#team"><span></span></a>
                <a href="/#team" class="fp-tooltip left">Наша команда</a>
            </li>
            <li><a href="/#testimonials"><span></span></a>
                <a href="/#testimonials" class="fp-tooltip left">Отзывы и клиенты</a>
            </li>
            <li><a href="/#about-us"><span></span></a>
                <a href="/#about-us" class="fp-tooltip left">Почему мы?</a>
            </li>
            <li><a href="/#works" class=""><span></span></a>
                <a href="/#works" class="fp-tooltip left">работы</a>
            </li>
            <li><a href="/#news" class=""><span></span></a>
                <a href="/#news" class="fp-tooltip left">новости</a>
            </li>
            <li><a href="/#contacts"><span></span></a>
                <a href="/#contacts" class="fp-tooltip left">Контакты</a>
            </li>
        </ul>
    </div>
<? get_footer() ?>