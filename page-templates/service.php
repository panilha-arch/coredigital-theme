<?php
/**
 * Template Name: Página de Serviço
 */
get_header();

$subtitle = get_post_meta(get_the_ID(), '_hero_subtitle', true);
$hero_desc = get_post_meta(get_the_ID(), '_hero_description', true);
?>

  <!-- HERO INNER -->
  <header class="hero-in">
    <div class="cn">
      <div class="breadcrumb"><a href="<?php echo home_url(); ?>">Core Digital</a> &rsaquo; <?php the_title(); ?></div>
      <h1><?php the_title(); ?><br><span class="grn"><?php echo esc_html($subtitle); ?></span></h1>
      <p><?php echo esc_html($hero_desc); ?></p>
    </div>
  </header>

  <!-- CONTENT -->
  <section class="content" aria-label="<?php the_title(); ?>">
    <div class="cn">
      <div class="blocks">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta" aria-label="Contato">
    <div class="cn">
      <h2>Vamos conversar sobre<br><span class="grn"><?php echo esc_html(strtolower(get_the_title())); ?></span>?</h2>
      <p>Sem compromisso. Uma conversa para entender seu momento e mostrar como podemos ajudar.</p>
      <a href="https://wa.me/<?php echo coredigital_whatsapp(); ?>" class="btn-d" target="_blank" rel="noopener noreferrer">
        Falar pelo WhatsApp
        <svg class="arrow-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </section>

<?php get_footer(); ?>
