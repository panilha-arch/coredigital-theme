<?php get_header(); ?>

<main class="lt sp">
  <div class="cn">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <h1 style="font-family:var(--serif);font-size:2.5rem;color:var(--dark);margin-bottom:24px"><?php the_title(); ?></h1>
        <div style="color:var(--g600);line-height:1.8"><?php the_content(); ?></div>
      </article>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
