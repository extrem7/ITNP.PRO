let news, works, worksApi, circles = true;

function header() {
    $('.toggle-btn').click(() => {
        $('.right-menu').fadeToggle();
        $('.toggle-btn').toggleClass('active');
    });
    $('ul.mobile a').click((e) => {
        if (!$('body').hasClass('home')) location.href = "/";
        $('.right-menu').fadeOut();
        $('.toggle-btn').removeClass('active');
    });
}

function categoriesFilter() {
    $('.news-categories a, .works-categories a').click((e) => {
        e.preventDefault();
        const $this = $(e.currentTarget),
            filterType = $this.parent().hasClass('works-categories') ? 'works' : 'news',
            category = parseInt($this.attr('data-category'));
        if (!$this.hasClass('active')) {
            $(`.${filterType}-categories a`).removeClass('active');
            $this.addClass('active');
        }
        if (category !== 0) {
            $(`.${filterType}-overflow .item`).hide(0, () => {
                $(`.${filterType}-overflow .item[data-category~=${category}]`).show(0);
            });
        } else {
            $(`.${filterType}-overflow .item`).hide(0, () => {
                $(`.${filterType}-overflow .item`).show(0);
            });
        }
        setTimeout(() => {
            filterType === 'works' ? worksApi.reinitialise() : news.reinitialise();
        }, 400);
    });
}

function makeCircle(selector, value, color, callback = Function) {
    $(selector).circleProgress({
        value: value / 100,
        size: 64,
        thickness: 6,
        lineCap: 'round',
        startAngle: -Math.PI / 2,
        emptyFill: 'transparent',
        fill: color
    });
    $(selector).find('span').text(value);
    setTimeout(() => {
        callback();
    }, 800);

}

function makeCircles() {
    setTimeout(() => {
        makeCircle('.circle-1', circle_1, '#e96656', () => {
            makeCircle('.circle-2', circle_2, '#34d293', () => {
                makeCircle('.circle-3', circle_3, '#3ab0e2', () => {
                    makeCircle('.circle-4', circle_4, '#e7ac44');
                });
            });
        });
    }, 800);
    circles = false;
}

function fullPage() {
    $('.section').attr('id', '');
    $('#fullpage').fullpage({
        //Навигация
        menu: '#scroll-menu',
        lockAnchors: false,
        anchors: ['empty', 'main', 'about', 'wwd', 'team', 'testimonials', 'about-us', 'works', 'news', 'contacts'],
        navigation: true,
        navigationPosition: 'left',
        navigationTooltips: ['empty', '<div class="home"></div>', 'О нас', 'Что мы решаем?', 'Наша команда', 'Отзывы и клиенты', 'Почему мы?', 'работы', 'новости', 'Контакты'],
        showActiveTooltip: true,
        slidesNavigation: true,
        slidesNavPosition: 'bottom',
        css3: false,
        afterLoad: function (anchorLink, index) {
            const list = $('#fp-nav li:nth-child(4),#fp-nav li:nth-child(5),#fp-nav li:nth-child(6),#fp-nav li:nth-child(7)');
            if ([4, 5, 6, 7].includes(index)) {
                list.fadeIn();
            }
            if (index === 1) {
                $.fn.fullpage.silentMoveTo('main', 0);
            }
            if (index === 7 && circles) {
                makeCircles();
            }
        },
        onLeave: function (index, nextIndex, direction) {
            const list = $('#fp-nav li:nth-child(4),#fp-nav li:nth-child(5),#fp-nav li:nth-child(6),#fp-nav li:nth-child(7)');
            console.log(Math.abs($(`#fullpage section:nth-child(${nextIndex})`).offset().top))
            if (nextIndex === 7 && direction === 'up' || nextIndex === 3 && direction === 'down' || nextIndex === 3 && index !== 2) {
                list.fadeIn();
            }
            if (nextIndex >= 8 && direction === 'down' || nextIndex === 2) {
                list.fadeOut();
            }
            if (nextIndex > 3 && nextIndex < 8) {
                $('#fp-nav li:nth-child(3) a').addClass('orange');
            } else {
                $('#fp-nav li:nth-child(3) a').removeClass('orange');
            }
            if (nextIndex === 7 && circles) {
                makeCircles();
            }
            $('.triangles').animate({top: (nextIndex - 2) * $('#fullpage').height()}, {
                duration: 700,
                easing: 'easeInOutCubic'
            });
            $('.black-triangle').animate({top: (nextIndex - 2) * $('#fullpage').height()}, {
                duration: 700,
                easing: 'easeInOutCubic'
            });
        },
    });
    if (window.location.hash.substr(1)) {
        $.fn.fullpage.silentMoveTo(window.location.hash.substr(1), 0);
    }
    $('.scroll-mouse, .scroll-down-btn').click((e) => {
        e.preventDefault();
        $.fn.fullpage.moveSectionDown();
    });
}

function moveBubbles() {
    $('.triangles ul img').each(function () {

        var random = Math.ceil(Math.random() * 100);
        var random2 = Math.ceil(Math.random() * 100);

        var whatWay = Math.ceil(Math.random() * 2);

        if (whatWay == 1) {
            $(this).transition({
                x: "+=" + random + "",
                y: "+=" + random2 + ""
            }, 8000, "linear");

        } else {

            $(this).transition({
                x: "-=" + random + "",
                y: "-=" + random2 + ""
            }, 8000, "linear");
        }
    });
}

$(() => {
    //#start header
    header();
    //#end header
    //#start jScrollPane
    news = $('.news-overflow').jScrollPane().data('jsp');
    $(window).on('orientationchange resize', () => {
        news.reinitialise();
    });

    setInterval(function () {
        moveBubbles();
    }, 1000);
    //#end jScrollPane
    if ($('body').hasClass('home')) {

        categoriesFilter();

        $("input[type=tel]").mask("+7 (999) 999-99-99");
        if (screen.availWidth > 991 /*&& screen.availHeight >= 768*/) {
            fullPage();
        } else {
            makeCircles();
        }
        $('.map').mouseenter(() => {
            $.fn.fullpage.setMouseWheelScrolling(false);
            $.fn.fullpage.setAllowScrolling(false);
        }).mouseleave(() => {
            $.fn.fullpage.setMouseWheelScrolling(true);
            $.fn.fullpage.setAllowScrolling(true);
        });
    }
    $('#scene').parallax({
        frictionX: 0.1,
        frictionY: 0.1
    });
    moveBubbles();
});

$(window).on("load", function () {
    setTimeout(()=>{
        $('.preloader-wrapper').fadeOut();
    },700);
    if ($('body').hasClass('home')) {

        const testimonials = $('.testimonials-overflow').jScrollPane(),
            clients = $('.clients-overflow').jScrollPane(),
            testimonialsApi = testimonials.data('jsp'),
            clientsApi = clients.data('jsp');
        works = $('.works-overflow').jScrollPane();
        worksApi = works.data('jsp');
        testimonials.bind(
            'mousewheel',
            function (event, delta, deltaY) {
                testimonialsApi.scrollByX(delta * -300, true);
                return false;
            }
        );
        clients.bind(
            'mousewheel',
            function (event, delta, deltaY) {
                clientsApi.scrollByX(delta * -300, true);
                return false;
            }
        );
        works.bind(
            'mousewheel',
            function (event, delta, deltaY) {
                worksApi.scrollByX(delta * -300, true);
                return false;
            }
        );
        $(window).on('orientationchange resize', () => {
            worksApi.reinitialise();
            testimonialsApi.reinitialise();
            clientsApi.reinitialise();
        });
    }
});