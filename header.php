<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="geo.region" content="BR-AM">
  <meta name="geo.placename" content="Manaus">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- NAV -->
  <nav class="main-nav" role="navigation" aria-label="Menu principal">
    <div class="cn">
      <a href="<?php echo home_url(); ?>" aria-label="Core Digital">
        <img src="<?php echo coredigital_logo_url(); ?>" alt="Core Digital" class="logo">
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
