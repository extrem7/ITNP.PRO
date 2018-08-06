<?
/* Template Name: Главная */
get_header(); ?>
<div id="fullpage">
    <div id="scroll-menu"></div>
    <section class="section empty">
    </section>
    <section class="section main" id="main">
        <? get_template_part('template-parts/triangles') ?>
        <div class="content container d-flex justify-content-center align-items-center">
            <? get_template_part('template-parts/logo') ?>
            <? getMouse() ?>
        </div>
    </section>
    <section class="section about" id="about">
        <div class="content container d-flex flex-wrap justify-content-around justify-content-lg-center align-items-center">
            <? get_template_part('template-parts/logo');
            $infoBlocks = get_field('о_нас');
            $infoBlocks['блок_1']['position'] = 'top-left';
            $infoBlocks['блок_2']['position'] = 'top-right';
            $infoBlocks['блок_3']['position'] = 'bottom-left';
            $infoBlocks['блок_4']['position'] = 'bottom-right';
            foreach ($infoBlocks as $infoBlock):
                ?>
                <div class="info-block <?= $infoBlock['position'] ?>">
                    <p class="title"><?= $infoBlock['заголовок'] ?></p>
                    <p class="text"><?= $infoBlock['текст'] ?></p>
                </div>
            <?
            endforeach;
            getMouse(true)
            ?>
        </div>
    </section>
    <section class="section what-we-do" id="wwd">
        <div class="content container">
            <img src="<?= path() ?>img/itnp-logo.png" alt="" class="it-logo">
            <div class="tabs d-flex align-items-center flex-column flex-lg-row">
                <p class="main-title">Что мы<br> решаем?</p>
                <div class="tab-content" id="myTabContent">
                    <?
                    $i = 0;
                    while (have_rows('решаем_вкладки')) : the_row();
                        ?>
                        <div class="tab-pane fade <?= $i == 0 ? 'show active' : '' ?>" id="<?= 'wwdTab-' . $i ?>">
                            <div class="d-flex justify-content-between align-items-center">
                                <img <? the_repeater_image('картинка') ?>>
                                <div class="right">
                                    <p class="section-title"><? the_sub_field('заголовок') ?></p>
                                    <p class="section-text"><? the_sub_field('текст') ?></p>
                                </div>
                            </div>
                        </div>
                        <? $i++;endwhile; ?>
                </div>
            </div>
            <div class="nav categories-list d-flex flex-wrap justify-content-around align-items-center">
                <p>Что мы решаем?</p>
                <?
                $i = 0;
                while (have_rows('решаем_вкладки')) : the_row();
                    ?>
                    <a class="<?= $i == 0 ? 'active' : '' ?>" data-toggle="tab"
                       href="#<?= 'wwdTab-' . $i ?>"><? the_sub_field('заголовок') ?></a>
                    <? $i++;endwhile; ?>
            </div>
            <? getMouse() ?>
        </div>
    </section>
    <section class="section team" id="team">
        <div class="content container">
            <img src="<?= path() ?>img/itnp-logo.png" alt="" class="it-logo">
            <h2 class="section-title"><? the_field('команда_заголовок') ?></h2>
            <p class="section-text"><? the_field('команда_текст') ?></p>
            <div class="row justify-content-around">
                <? while (have_rows('команда')) : the_row(); ?>
                    <div class="member col-lg-3 col-md-6">
                        <div class="photo"><img <? the_repeater_image('фото') ?>></div>
                        <p class="name"><? the_sub_field('имя') ?></p>
                        <p class="position"><? the_sub_field('должность') ?></p>
                        <p class="text"><? the_sub_field('текст') ?></p>
                    </div>
                <? endwhile; ?>
            </div>
            <? getMouse() ?>
        </div>
    </section>
    <section class="section testimonials" id="testimonials">
        <div class="content container">
            <img src="<?= path() ?>img/itnp-logo.png" alt="" class="it-logo">
            <h2 class="section-title"><? the_field('отзывы_заголовок') ?></h2>
            <div class="testimonials-overflow white-scroll">
                <div class="d-flex">
                    <? while (have_rows('отзывы')) : the_row(); ?>
                        <a href="<? the_sub_field('ссылка') ?>" target="_blank" class="item">
                            <p class="name"><? the_sub_field('имя') ?></p>
                            <div class="photo">
                                <img <? the_repeater_image('фото') ?>>
                            </div>
                            <p class="position"><? the_sub_field('место_работы') ?></p>
                            <p class="text"><? the_sub_field('текст') ?></p>
                        </a>
                    <? endwhile; ?>
                </div>
            </div>
            <div class="clients-overflow">
                <div class="d-flex align-items-center">
                    <? while (have_rows('клиенты')) : the_row(); ?>
                        <a href="<? the_sub_field('ссылка') ?>"
                           target="_blank"><img <? the_repeater_image('лого') ?>></a>
                    <? endwhile; ?>
                </div>
            </div>
            <? getMouse() ?>
        </div>
    </section>
    <section class="section advantages" id="about-us">
        <div class="content container">
            <img src="<?= path() ?>img/itnp-logo.png" alt="" class="it-logo">
            <h2 class="section-title"><? the_field('почему_заголовок') ?></h2>
            <p class="section-text"><? the_field('почему_текст') ?></p>
            <div class="row">
                <?
                $circles = get_field('почему_проценты');
                ?>
                <script>
                    circle_1 = <?= $circles['круг_1']['проценты'] ?>;
                    circle_2 = <?= $circles['круг_2']['проценты'] ?>;
                    circle_3 = <?= $circles['круг_3']['проценты'] ?>;
                    circle_4 = <?= $circles['круг_4']['проценты'] ?>;
                </script>
                <div class="item col-md-6">
                    <div class="circle circle-1">
                        <span class="count"></span>
                    </div>
                    <div class="right">
                        <p class="title"><?= $circles['круг_1']['заголовок'] ?></p>
                        <p class="text"><?= $circles['круг_1']['текст'] ?></p>
                    </div>
                </div>
                <div class="item col-md-6">
                    <div class="circle circle-2">
                        <span class="count"></span>
                    </div>
                    <div class="right">
                        <p class="title"><?= $circles['круг_2']['заголовок'] ?></p>
                        <p class="text"><?= $circles['круг_2']['текст'] ?></p>
                    </div>
                </div>
                <div class="item col-md-6">
                    <div class="circle circle-3">
                        <span class="count"></span>
                    </div>
                    <div class="right">
                        <p class="title"><?= $circles['круг_3']['заголовок'] ?></p>
                        <p class="text"><?= $circles['круг_3']['текст'] ?></p>
                    </div>
                </div>
                <div class="item col-md-6">
                    <div class="circle circle-4">
                        <span class="count"></span>
                    </div>
                    <div class="right">
                        <p class="title"><?= $circles['круг_4']['заголовок'] ?></p>
                        <p class="text"><?= $circles['круг_4']['текст'] ?></p>
                    </div>
                </div>
            </div>
            <? getMouse() ?>
        </div>
    </section>
    <section class="section works" id="works">
        <div class="content container">
            <img src="<?= path() ?>img/itnp-logo.png" alt="" class="it-logo">
            <h2 class="section-title">наши работы</h2>
            <? get_template_part('template-parts/works-loop') ?>
            <? getMouse() ?>
        </div>
    </section>
    <section class="section news" id="news">
        <div class="content container">
            <img src="<?= path() ?>img/itnp-logo.png" alt="" class="it-logo">
            <h2 class="section-title">Новости</h2>
            <? get_template_part('template-parts/news-loop') ?>
            <? getMouse() ?>
        </div>
    </section>
    <section class="section contacts" id="contacts">
        <div class="content container">
            <img src="<?= path() ?>img/itnp-logo.png" alt="" class="it-logo">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="text-block">
                        <h2 class="section-title">Контакты</h2>
                        <div class="d-flex contact-item align-items-center"><img src="<?= path() ?>img/icon-map.png"
                                                                                 alt="">
                            <p><? the_field('контакты_адрес') ?></p></div>
                        <div class="d-flex contact-item justify-content-start justify-content-sm-around justify-content-lg-between flex-column flex-md-row">
                            <div class="d-flex align-items-center">
                                <img src="<?= path() ?>img/icon-phone.png" alt="">
                                <p><? the_field('контакты_телефоны') ?></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="<?= path() ?>img/icon-clock.png" alt="">
                                <p><? the_field('контакты_график') ?></p>
                            </div>
                        </div>
                        <div class="d-flex contact-item align-items-center">
                            <img src="<?= path() ?>img/icon-map.png" alt="">
                            <p>
                                <a href="mailto:<? the_field('контакты_почта') ?>"><b><? the_field('контакты_почта') ?></b></a>
                            </p>
                        </div>
                    </div>
                    <div class="form">
                        <?= do_shortcode('[contact-form-7 id="144" title="Контакты"]') ?>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 map"><? the_field('контакты_карта') ?></div>
            </div>
        </div>
    </section>
</div>
<? get_footer() ?>
