<?php
/**
 * Core Digital Theme Functions
 */

// ═══ THEME SETUP ═══
function coredigital_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    register_nav_menus(array(
        'primary' => 'Menu Principal',
        'footer'  => 'Menu Footer',
    ));
}
add_action('after_setup_theme', 'coredigital_setup');

// ═══ ENQUEUE STYLES & SCRIPTS ═══
function coredigital_scripts() {
    // Fonts
    wp_enqueue_style('satoshi-font', 'https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap', array(), null);
    wp_enqueue_style('instrument-serif', 'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap', array(), null);

    // Theme stylesheet
    wp_enqueue_style('coredigital-style', get_stylesheet_uri(), array('satoshi-font', 'instrument-serif'), '1.0');

    // Theme scripts
    wp_enqueue_script('coredigital-scripts', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'coredigital_scripts');

// ═══ REMOVE WORDPRESS DEFAULTS ═══
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

// ═══ CUSTOM FIELDS FOR PAGES ═══
function coredigital_add_meta_boxes() {
    add_meta_box(
        'coredigital_page_fields',
        'Core Digital - Campos da Página',
        'coredigital_page_fields_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'coredigital_add_meta_boxes');

function coredigital_page_fields_callback($post) {
    wp_nonce_field('coredigital_save_meta', 'coredigital_meta_nonce');

    $hero_desc = get_post_meta($post->ID, '_hero_description', true);
    $hero_subtitle = get_post_meta($post->ID, '_hero_subtitle', true);

    echo '<p><label><strong>Subtítulo do Hero (verde):</strong></label><br>';
    echo '<input type="text" name="hero_subtitle" value="' . esc_attr($hero_subtitle) . '" style="width:100%;padding:8px;"></p>';

    echo '<p><label><strong>Descrição do Hero:</strong></label><br>';
    echo '<textarea name="hero_description" rows="3" style="width:100%;padding:8px;">' . esc_textarea($hero_desc) . '</textarea></p>';
}

function coredigital_save_meta($post_id) {
    if (!isset($_POST['coredigital_meta_nonce']) || !wp_verify_nonce($_POST['coredigital_meta_nonce'], 'coredigital_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['hero_description'])) {
        update_post_meta($post_id, '_hero_description', sanitize_textarea_field($_POST['hero_description']));
    }
    if (isset($_POST['hero_subtitle'])) {
        update_post_meta($post_id, '_hero_subtitle', sanitize_text_field($_POST['hero_subtitle']));
    }
}
add_action('save_post', 'coredigital_save_meta');

// ═══ YOAST SEO SUPPORT ═══
function coredigital_add_schema_faq($schema) {
    return $schema; // Let Yoast handle schema
}

// ═══ WHATSAPP NUMBER ═══
function coredigital_whatsapp() {
    return '5592981009800';
}

// ═══ HELPER: Logo URL ═══
function coredigital_logo_url() {
    return get_template_directory_uri() . '/assets/img/logo.png';
}

function coredigital_logo_vert_url() {
    return get_template_directory_uri() . '/assets/img/logo-vert.png';
}

// ═══ CREATE PAGES ON THEME ACTIVATION ═══
function coredigital_create_pages() {
    $pages = array(
        array('title' => 'Tráfego Pago', 'slug' => 'trafego-pago', 'template' => 'page-templates/service.php',
              'subtitle' => 'que gera resultado real',
              'desc' => 'Gestão de Meta Ads e Google Ads para negócios em Manaus que precisam de campanhas com segmentação precisa, otimização diária e retorno mensurável.'),
        array('title' => 'Gestão de Redes Sociais', 'slug' => 'gestao-redes-sociais', 'template' => 'page-templates/service.php',
              'subtitle' => 'com estratégia e consistência',
              'desc' => 'Planejamento editorial, criação de conteúdo e gestão diária do Instagram para marcas em Manaus que precisam de presença digital profissional.'),
        array('title' => 'Conteúdo Estratégico', 'slug' => 'conteudo-estrategico', 'template' => 'page-templates/service.php',
              'subtitle' => 'que posiciona sua marca',
              'desc' => 'Roteiros de Reels, carrosséis que educam, legendas que conectam. Cada peça de conteúdo tem um objetivo claro dentro da estratégia da sua marca.'),
        array('title' => 'Mídia de Performance', 'slug' => 'midia-performance', 'template' => 'page-templates/service.php',
              'subtitle' => 'orientada por dados',
              'desc' => 'Campanhas que geram número, não vaidade. Acompanhamento diário, otimização contínua e relatórios com métricas reais sobre cada centavo investido.'),
        array('title' => 'Posicionamento Digital', 'slug' => 'posicionamento-digital', 'template' => 'page-templates/service.php',
              'subtitle' => 'para marcas que levam o digital a sério',
              'desc' => 'Tom de voz, identidade no digital e estratégia de presença. Para marcas que precisam parecer tão boas online quanto são no mundo real.'),
        array('title' => 'Consultoria', 'slug' => 'consultoria', 'template' => 'page-templates/service.php',
              'subtitle' => 'de marketing digital',
              'desc' => 'Diagnóstico completo antes de qualquer investimento. Entendemos seu momento, analisamos o que existe e montamos o caminho mais curto até o resultado.'),
        array('title' => 'Shopping Centers', 'slug' => 'shopping-centers', 'template' => 'page-templates/service.php',
              'subtitle' => 'Marketing Digital',
              'desc' => 'Campanhas sazonais, tráfego para lojistas, conteúdo institucional e gestão de redes sociais para grandes centros comerciais de Manaus.'),
        array('title' => 'Saúde e Estética', 'slug' => 'saude-estetica', 'template' => 'page-templates/service.php',
              'subtitle' => 'Marketing Digital',
              'desc' => 'Posicionamento digital para médicos, clínicas e profissionais de saúde em Manaus. Conteúdo com autoridade e campanhas dentro das normas do CFM.'),
        array('title' => 'Varejo e Comércio', 'slug' => 'varejo', 'template' => 'page-templates/service.php',
              'subtitle' => 'Marketing Digital',
              'desc' => 'Tráfego pago para lojas físicas e e-commerce em Manaus. Campanhas de conversão, remarketing e conteúdo para gerar vendas recorrentes.'),
        array('title' => 'Gastronomia', 'slug' => 'gastronomia', 'template' => 'page-templates/service.php',
              'subtitle' => 'Marketing Digital',
              'desc' => 'Gestão de redes sociais para restaurantes, bares e delivery em Manaus. Conteúdo visual, promoções e campanhas de alcance local.'),
        array('title' => 'Serviços e Profissionais', 'slug' => 'servicos-profissionais', 'template' => 'page-templates/service.php',
              'subtitle' => 'Marketing Digital',
              'desc' => 'Posicionamento digital para advogados, contadores, arquitetos e outros profissionais que precisam de autoridade online em Manaus.'),
        array('title' => 'Turismo e Hotelaria', 'slug' => 'turismo-hotelaria', 'template' => 'page-templates/service.php',
              'subtitle' => 'Marketing Digital',
              'desc' => 'Campanhas para pousadas, hotéis e operadoras de turismo na região amazônica. Google Ads, redes sociais e conteúdo de destino.'),
    );

    foreach ($pages as $page_data) {
        if (get_page_by_path($page_data['slug'])) continue;

        $page_id = wp_insert_post(array(
            'post_title'   => $page_data['title'],
            'post_name'    => $page_data['slug'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ));

        if ($page_id) {
            update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            update_post_meta($page_id, '_hero_subtitle', $page_data['subtitle']);
            update_post_meta($page_id, '_hero_description', $page_data['desc']);
        }
    }
}
add_action('after_switch_theme', 'coredigital_create_pages');
