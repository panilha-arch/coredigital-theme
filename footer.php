  <!-- FOOTER -->
  <footer class="main-footer" role="contentinfo">
    <div class="cn">
      <div class="ft">
        <div class="fb-brand">
          <img src="<?php echo coredigital_logo_url(); ?>" alt="Core Digital">
          <p>Agência de publicidade em Manaus. Conteúdo estratégico, gestão de redes sociais e mídia de performance para marcas que querem resultado real.</p>
        </div>
        <div class="fc">
          <h4>Navegação</h4>
          <a href="<?php echo home_url('#servicos'); ?>">Serviços</a>
          <a href="<?php echo home_url('#segmentos'); ?>">Segmentos</a>
          <a href="<?php echo home_url('#sobre'); ?>">Sobre</a>
          <a href="<?php echo home_url('#clientes'); ?>">Clientes</a>
          <a href="<?php echo home_url('#faq'); ?>">FAQ</a>
        </div>
        <div class="fc">
          <h4>Serviços</h4>
          <a href="<?php echo home_url('/trafego-pago/'); ?>">Tráfego Pago</a>
          <a href="<?php echo home_url('/gestao-redes-sociais/'); ?>">Redes Sociais</a>
          <a href="<?php echo home_url('/conteudo-estrategico/'); ?>">Conteúdo</a>
          <a href="<?php echo home_url('/midia-performance/'); ?>">Performance</a>
          <a href="<?php echo home_url('/consultoria/'); ?>">Consultoria</a>
        </div>
        <div class="fc">
          <h4>Contato</h4>
          <a href="https://wa.me/<?php echo coredigital_whatsapp(); ?>" target="_blank" rel="noopener">WhatsApp</a>
          <a href="https://www.instagram.com/coredigital.co/" target="_blank" rel="noopener">Instagram</a>
          <a href="mailto:contato@coredigi.co">contato@coredigi.co</a>
        </div>
      </div>
      <div class="f-bot">
        <p>&copy; <?php echo date('Y'); ?> Core Digital. Todos os direitos reservados.</p>
        <p>Manaus, Amazonas &mdash; Brasil</p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
