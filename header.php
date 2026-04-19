<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="geo.region" content="BR-AM">
  <meta name="geo.placename" content="Manaus">
  <meta name="geo.position" content="-3.1073512;-60.0096749">
  <meta name="ICBM" content="-3.1073512, -60.0096749">

  <?php
  $page_title = is_front_page() ? 'Core Digital — Agência de Publicidade e Performance em Manaus' : wp_get_document_title();
  $page_description = coredigital_meta_description();
  $page_url = is_front_page() ? home_url('/') : get_permalink();
  $og_image = coredigital_og_image();
  ?>
  <meta name="description" content="<?php echo esc_attr($page_description); ?>">
  <link rel="canonical" href="<?php echo esc_url($page_url); ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="pt_BR">
  <meta property="og:site_name" content="Core Digital">
  <meta property="og:title" content="<?php echo esc_attr($page_title); ?>">
  <meta property="og:description" content="<?php echo esc_attr($page_description); ?>">
  <meta property="og:url" content="<?php echo esc_url($page_url); ?>">
  <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr($page_title); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr($page_description); ?>">
  <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>">

  <!-- Schema.org LocalBusiness -->
  <script type="application/ld+json">
  <?php echo wp_json_encode(coredigital_schema_localbusiness(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
  </script>

  <?php if ( is_front_page() ) : ?>
  <script type="application/ld+json">
  <?php echo wp_json_encode(coredigital_schema_faq(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
  </script>
  <?php endif; ?>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-P4ZKHVL2B7"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-P4ZKHVL2B7');
  </script>

  <!-- Lead tracking (WhatsApp / e-mail / telefone) -->
  <script>
    document.addEventListener('click', function(e) {
      var link = e.target.closest('a');
      if (!link) return;
      var href = link.getAttribute('href') || '';
      var method = null;
      if (href.indexOf('wa.me') !== -1 || href.indexOf('api.whatsapp.com') !== -1) method = 'whatsapp';
      else if (href.indexOf('mailto:') === 0) method = 'email';
      else if (href.indexOf('tel:') === 0) method = 'phone';
      if (!method || typeof gtag !== 'function') return;
      gtag('event', 'generate_lead', {
        method: method,
        link_url: href,
        link_text: (link.innerText || '').trim().slice(0, 60),
        link_location: link.closest('nav') ? 'nav' : (link.closest('footer') ? 'footer' : 'body')
      });
    }, true);
  </script>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- NAV -->
  <nav class="main-nav" role="navigation" aria-label="Menu principal">
    <div class="cn">
      <a href="<?php echo home_url(); ?>" aria-label="Core Digital">
        <img src="<?php echo coredigital_logo_url(); ?>" alt="Core Digital" class="logo" width="30" height="30" fetchpriority="high" decoding="async">
      </a>
      <ul class="nl" id="nl">
        <li><a href="<?php echo home_url('#servicos'); ?>">Serviços</a></li>
        <li><a href="<?php echo home_url('#segmentos'); ?>">Segmentos</a></li>
        <li><a href="<?php echo home_url('#sobre'); ?>">Sobre</a></li>
        <li><a href="<?php echo home_url('#clientes'); ?>">Clientes</a></li>
        <li><a href="<?php echo home_url('#faq'); ?>">FAQ</a></li>
        <li><a href="https://wa.me/<?php echo coredigital_whatsapp(); ?>" class="nav-cta" target="_blank" rel="noopener noreferrer">Fale Conosco</a></li>
      </ul>
      <button class="mt" aria-label="Menu" onclick="document.getElementById('nl').classList.toggle('open')">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>
