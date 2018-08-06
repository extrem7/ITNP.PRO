<?php
add_action('init', 'register_works');

function register_works()
{
    register_post_type('work', [
        'labels' => [
            'name' => 'Работа', // основное название для типа записи
            'singular_name' => 'Работа', // название для одной записи этого типа
            'add_new' => 'Добавить работу', // для добавления новой записи
            'add_new_item' => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование работы', // для редактирования типа записи
            'new_item' => '', // текст новой записи
            'view_item' => 'Смотреть операцию', // для просмотра записи этого типа.
            'search_items' => 'Искать работы', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name' => 'Работы', // название меню
        ],
        'public' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-art',
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
        'has_archive' => false,
        'rewrite' => array('slug' => 'work'),
    ]);

    register_taxonomy('work_category', array('work'), array(
        'label' => '',
        // определяется параметром $labels->name
        'labels' => array(
            'name' => 'Тип',
            'singular_name' => 'Тип',
            'search_items' => 'Искать тип',
            'all_items' => 'Все типы',
            'view_item ' => 'Смотреть тип',
            'parent_item' => 'Parent тип',
            'parent_item_colon' => 'Parent тип:',
            'edit_item' => 'Редактировать тип',
            'update_item' => 'Обновить тип',
            'add_new_item' => 'Добавить тип',
            'new_item_name' => 'Название типов',
            'menu_name' => 'Тип',
        ),
        'description' => '',
        // описание таксономии
        'public' => true,
        'publicly_queryable' => null,
        // равен аргументу public
        'show_in_nav_menus' => true,
        // равен аргументу public
        'show_ui' => true,
        // равен аргументу public
        'show_tagcloud' => true,
        // равен аргументу show_ui
        'show_in_rest' => null,
        // добавить в REST API
        'rest_base' => null,
        // $taxonomy
        'hierarchical' => true,
        'update_count_callback' => '',
        'rewrite' => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities' => array(),
        'meta_box_cb' => null,
        // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column' => false,
        // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin' => false,
        'show_in_quick_edit' => null,
        // по умолчанию значение show_ui
    ));
}