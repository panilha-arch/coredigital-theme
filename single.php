<?php get_header(); ?>

<article class="post-single">
  <header class="post-hero">
    <div class="cn">
      <div class="breadcrumb rv">
        <a href="<?php echo home_url(); ?>">Core Digital</a> &rsaquo;
        <a href="<?php echo home_url('/blog/'); ?>">Blog</a> &rsaquo;
        <?php the_title(); ?>
      </div>
      <?php
      $categories = get_the_category();
      if (!empty($categories)) : ?>
        <div class="post-cat rv"><?php echo esc_html($categories[0]->name); ?></div>
      <?php endif; ?>
      <h1 class="rv"><?php the_title(); ?></h1>
      <div class="post-meta rv">
        <span><?php echo get_the_date('d \d\e F \d\e Y'); ?></span>
        <span>&bull;</span>
        <span><?php echo coredigital_reading_time(get_the_content()); ?> min de leitura</span>
      </div>
    </div>
  </header>

  <?php if (has_post_thumbnail()) : ?>
  <div class="post-thumb">
    <div class="cn">
      <?php the_post_thumbnail('full', array('loading' => 'eager', 'fetchpriority' => 'high')); ?>
    </div>
  </div>
  <?php endif; ?>

  <div class="post-body">
    <div class="cn">
      <div class="post-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

  <section class="cta" aria-label="Contato">
    <div class="cn">
      <h2>Quer resultado como esse<br><span class="grn">no seu negócio?</span></h2>
      <p>Uma conversa rápida pelo WhatsApp pra entender seu momento e mostrar como podemos ajudar.</p>
      <a href="https://wa.me/<?php echo coredigital_whatsapp(); ?>" class="btn-d" target="_blank" rel="noopener noreferrer">
        Falar pelo WhatsApp
        <svg class="arrow-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </section>
</article>

<script type="application/ld+json">
<?php
$author = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
$schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => get_the_title(),
    'description' => get_the_excerpt(),
    'datePublished' => get_the_date('c'),
    'dateModified' => get_the_modified_date('c'),
    'author' => array('@type' => 'Organization', 'name' => 'Core Digital'),
    'publisher' => array(
        '@type' => 'Organization',
        'name' => 'Core Digital',
        'logo' => array('@type' => 'ImageObject', 'url' => get_template_directory_uri() . '/assets/img/logo.png'),
    ),
    'mainEntityOfPage' => array('@type' => 'WebPage', '@id' => get_permalink()),
);
if (has_post_thumbnail()) {
    $schema['image'] = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
</script>

<?php get_footer(); ?>
