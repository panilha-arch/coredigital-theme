<?php get_header(); ?>

<header class="hero-in">
  <div class="cn">
    <div class="breadcrumb"><a href="<?php echo home_url(); ?>">Core Digital</a> &rsaquo; Blog</div>
    <h1>Blog da Core Digital<br><span class="grn">estratégia, dado e prática</span></h1>
    <p>Guias, análises e respostas diretas sobre marketing digital, tráfego pago, redes sociais e performance para negócios em Manaus e na região Norte.</p>
  </div>
</header>

<section class="content" aria-label="Posts do blog">
  <div class="cn">
    <?php if (have_posts()) : ?>
      <div class="post-grid">
      <?php while (have_posts()) : the_post(); ?>
        <article class="post-card rv">
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="post-card-thumb">
              <?php the_post_thumbnail('medium_large', array('loading' => 'lazy', 'decoding' => 'async')); ?>
            </a>
          <?php endif; ?>
          <div class="post-card-body">
            <?php $cats = get_the_category(); if (!empty($cats)) : ?>
              <span class="post-card-cat"><?php echo esc_html($cats[0]->name); ?></span>
            <?php endif; ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo esc_html(get_the_excerpt()); ?></p>
            <div class="post-card-meta">
              <span><?php echo get_the_date('d/m/Y'); ?></span>
              <span>&bull;</span>
              <span><?php echo coredigital_reading_time(get_the_content()); ?> min</span>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
      </div>
      <div class="pagination"><?php the_posts_pagination(array('prev_text' => '&larr; Anterior', 'next_text' => 'Próxima &rarr;')); ?></div>
    <?php else : ?>
      <p>Nenhum post publicado ainda. Volte em breve.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
