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
    // Fonts — pesos reduzidos, só o necessário
    wp_enqueue_style('satoshi-font', 'https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap', array(), null);
    wp_enqueue_style('fraunces', 'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,700&display=swap', array(), null);

    // Theme stylesheet
    wp_enqueue_style('coredigital-style', get_stylesheet_uri(), array(), '2.4');

    // Theme scripts
    wp_enqueue_script('coredigital-scripts', get_template_directory_uri() . '/assets/js/main.js', array(), '2.1', true);
}
add_action('wp_enqueue_scripts', 'coredigital_scripts');

// ═══ PRECONNECT DE FONTES ═══
function coredigital_resource_hints($hints, $relation_type) {
    if ($relation_type === 'preconnect') {
        $hints[] = array('href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous');
        $hints[] = array('href' => 'https://api.fontshare.com', 'crossorigin' => 'anonymous');
    }
    return $hints;
}
add_filter('wp_resource_hints', 'coredigital_resource_hints', 10, 2);

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
              'desc' => 'Campanhas sazonais, conteúdo institucional e gestão de redes sociais para grandes centros comerciais de Manaus.'),
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

// ═══ META DESCRIPTION DINÂMICA ═══
function coredigital_meta_description() {
    if (is_front_page()) {
        return 'Core Digital é uma agência de publicidade e performance em Manaus. Especialistas em tráfego pago (Meta Ads e Google Ads), gestão de redes sociais, conteúdo estratégico e mídia de performance para marcas que querem resultado real na região Norte.';
    }
    if (is_page()) {
        $desc = get_post_meta(get_the_ID(), '_hero_description', true);
        if ($desc) return $desc;
        $excerpt = get_the_excerpt();
        if ($excerpt) return $excerpt;
    }
    return get_bloginfo('description');
}

// ═══ OG IMAGE ═══
function coredigital_og_image() {
    $custom = get_template_directory_uri() . '/assets/img/og-image.png';
    $fallback = get_template_directory_uri() . '/assets/img/logo.png';
    $path = get_template_directory() . '/assets/img/og-image.png';
    return file_exists($path) ? $custom : $fallback;
}

// ═══ SCHEMA.ORG LOCALBUSINESS ═══
function coredigital_schema_localbusiness() {
    return array(
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        '@id' => home_url('/#business'),
        'name' => 'Core Digital',
        'alternateName' => 'Core Digital Agência',
        'description' => 'Agência de publicidade e performance em Manaus. Tráfego pago, gestão de redes sociais, conteúdo estratégico e mídia de performance.',
        'url' => home_url('/'),
        'telephone' => '+55-92-98100-9800',
        'email' => 'contato@coredigi.co',
        'image' => get_template_directory_uri() . '/assets/img/logo.png',
        'logo' => get_template_directory_uri() . '/assets/img/logo.png',
        'priceRange' => '$$',
        'address' => array(
            '@type' => 'PostalAddress',
            'addressLocality' => 'Manaus',
            'addressRegion' => 'AM',
            'addressCountry' => 'BR',
        ),
        'geo' => array(
            '@type' => 'GeoCoordinates',
            'latitude' => -3.1073512,
            'longitude' => -60.0096749,
        ),
        'areaServed' => array(
            array('@type' => 'City', 'name' => 'Manaus'),
            array('@type' => 'State', 'name' => 'Amazonas'),
            array('@type' => 'State', 'name' => 'Roraima'),
            array('@type' => 'AdministrativeArea', 'name' => 'Região Norte do Brasil'),
        ),
        'sameAs' => array(
            'https://www.instagram.com/coredigital.co/',
        ),
        'openingHoursSpecification' => array(
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'),
            'opens' => '09:00',
            'closes' => '18:00',
        ),
        'hasOfferCatalog' => array(
            '@type' => 'OfferCatalog',
            'name' => 'Serviços de Marketing Digital',
            'itemListElement' => array(
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Tráfego Pago (Meta Ads e Google Ads)')),
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Gestão de Redes Sociais')),
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Conteúdo Estratégico')),
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Mídia de Performance')),
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Posicionamento Digital')),
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Consultoria de Marketing Digital')),
            ),
        ),
    );
}

// ═══ SCHEMA.ORG FAQPAGE ═══
function coredigital_schema_faq() {
    $faqs = array(
        array('q' => 'Qual o investimento mínimo em tráfego pago?', 'a' => 'Depende do objetivo e do segmento. Trabalhamos com orçamentos acessíveis para pequenos e médios negócios em Manaus. Na primeira conversa, definimos juntos o valor que faz sentido.'),
        array('q' => 'Vocês atendem fora de Manaus?', 'a' => 'Sim. Foco em Manaus e região Norte, mas já atendemos Roraima e outras localidades. Gestão de tráfego e conteúdo funcionam bem de forma remota.'),
        array('q' => 'Qual a diferença entre gestão de redes e tráfego pago?', 'a' => 'Redes sociais cuida do orgânico: posts, stories, editorial. Tráfego pago são campanhas em Meta Ads e Google Ads para alcançar mais gente e converter. Os dois se complementam.'),
        array('q' => 'Em quanto tempo vejo resultado?', 'a' => 'Tráfego pago gera resultado na primeira semana. Posicionamento e conteúdo levam 60 a 90 dias para consolidar. Somos transparentes com prazos desde o primeiro dia.'),
        array('q' => 'Vocês fazem gestão de Instagram?', 'a' => 'Sim. Planejamento editorial completo, criação de conteúdo (Reels, carrosséis, stories), legendas estratégicas e gestão diária. Tudo alinhado com a identidade da marca.'),
        array('q' => 'Vocês entregam relatórios?', 'a' => 'Todo mês. Relatório completo com alcance, engajamento, investimento, conversões e análise de performance. Dado aberto, sem enrolação.'),
    );
    $items = array();
    foreach ($faqs as $faq) {
        $items[] = array(
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $faq['a'],
            ),
        );
    }
    return array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $items,
    );
}
