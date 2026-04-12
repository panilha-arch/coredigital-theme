<?php
/**
 * Default Page Template
 */
get_header();
?>

  <header class="hero-in">
    <div class="cn">
      <div class="breadcrumb"><a href="<?php echo home_url(); ?>">Core Digital</a> &rsaquo; <?php the_title(); ?></div>
      <h1><?php the_title(); ?></h1>
    </div>
  </header>

  <section class="content">
    <div class="cn">
      <?php the_content(); ?>
    </div>
  </section>

  <section class="cta" aria-label="Contato">
    <div class="cn">
      <h2>Vamos conversar?</h2>
      <p>Sem compromisso. Uma conversa para entender seu momento e mostrar como podemos ajudar.</p>
      <a href="https://wa.me/<?php echo coredigital_whatsapp(); ?>" class="btn-d" target="_blank" rel="noopener noreferrer">
        Falar pelo WhatsApp
        <svg class="arrow-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </section>

<?php get_footer(); ?>
