<?php get_header(); ?>

  <!-- HERO -->
  <header class="hero" id="inicio">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="cn">
      <div class="hero-ey">Agência de publicidade em Manaus</div>
      <h1>
        <span class="ln"><span class="ln-i">Sua marca precisa</span></span>
        <span class="ln"><span class="ln-i">de <span class="grn">direção</span>, não</span></span>
        <span class="ln"><span class="ln-i">de mais promessa.</span></span>
      </h1>
      <div class="hero-bot">
        <p class="hero-desc">Conteúdo estratégico, redes sociais e mídia de performance para negócios que já têm qualidade no que fazem e precisam de presença digital real.</p>
        <a href="https://wa.me/<?php echo coredigital_whatsapp(); ?>" class="btn-g" target="_blank" rel="noopener noreferrer">
          <span>Iniciar conversa</span>
          <svg class="arrow-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
    <div class="sh"><span>Scroll</span><div class="sh-line"></div></div>
  </header>

  <!-- MARQUEE -->
  <div class="mq" aria-hidden="true">
    <div class="mq-t">
      <?php $items = array('Tráfego Pago','Conteúdo Estratégico','Gestão de Redes Sociais','Mídia de Performance','Posicionamento Digital','Meta Ads','Google Ads','Reels','Carrossel','Marketing Digital Manaus');
      for ($i = 0; $i < 2; $i++) { foreach ($items as $item) { echo '<span class="mq-i">' . $item . '</span>'; } } ?>
    </div>
  </div>

  <!-- SERVIÇOS -->
  <section id="servicos" class="lt sp" aria-label="Serviços de marketing digital em Manaus">
    <div class="cn">
      <div class="sh-row rv">
        <div><div class="ey">Serviços</div><h2 class="st">O que fazemos<br>pelo seu negócio</h2></div>
        <p class="sd">Cada serviço resolve um problema específico. Nada de pacote genérico. A estratégia certa para o momento da sua marca.</p>
      </div>
      <div class="sg">
        <?php
        $services = array(
          array('num' => '01', 'title' => 'Tráfego Pago', 'slug' => 'trafego-pago', 'desc' => 'Meta Ads e Google Ads com segmentação precisa, otimização diária e foco em conversão. Cada real investido precisa voltar.'),
          array('num' => '02', 'title' => 'Gestão de Redes Sociais', 'slug' => 'gestao-redes-sociais', 'desc' => 'Planejamento editorial, criação de conteúdo e gestão diária do Instagram. Presença que constrói marca, não só preenche feed.'),
          array('num' => '03', 'title' => 'Conteúdo Estratégico', 'slug' => 'conteudo-estrategico', 'desc' => 'Roteiros de Reels, carrosséis que educam, legendas que conectam. Cada peça tem objetivo claro dentro da estratégia.'),
          array('num' => '04', 'title' => 'Mídia de Performance', 'slug' => 'midia-performance', 'desc' => 'Campanhas que geram número, não vaidade. Relatórios mensais com métricas reais e análise de cada centavo investido.'),
          array('num' => '05', 'title' => 'Posicionamento Digital', 'slug' => 'posicionamento-digital', 'desc' => 'Tom de voz, identidade no digital, estratégia de presença. Para marcas que precisam parecer tão boas quanto são.'),
          array('num' => '06', 'title' => 'Consultoria', 'slug' => 'consultoria', 'desc' => 'Diagnóstico completo antes de qualquer investimento. Entendemos seu momento e montamos o caminho mais curto até o resultado.'),
        );
        foreach ($services as $s) : ?>
        <article class="sc rv">
          <div class="sn"><?php echo $s['num']; ?></div>
          <h3><a href="<?php echo home_url('/' . $s['slug'] . '/'); ?>"><?php echo $s['title']; ?></a></h3>
          <p><?php echo $s['desc']; ?></p>
          <div class="sa"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- STATS -->
  <div class="stats" aria-label="Números da Core Digital">
    <div class="cn"><div class="stats-g">
      <div class="sb rv"><div class="sb-n" data-target="50" data-suffix="+">0</div><div class="sb-l">Marcas atendidas</div></div>
      <div class="sb rv"><div class="sb-n" data-target="500" data-suffix="mil+">0</div><div class="sb-l">Em mídia gerenciada</div></div>
      <div class="sb rv"><div class="sb-n" data-target="100" data-suffix="%">0</div><div class="sb-l">Foco em resultado</div></div>
      <div class="sb rv"><div class="sb-n" data-text="true">Manaus</div><div class="sb-l">Amazonas, Brasil</div></div>
    </div></div>
  </div>

  <!-- SEGMENTOS -->
  <section id="segmentos" class="sp dk" aria-label="Segmentos que atendemos em Manaus">
    <div class="cn">
      <div class="ey rv">Segmentos</div>
      <h2 class="st rv">Negócios que atendemos<br>em Manaus e região Norte</h2>
      <p class="sd rv">Trabalhamos com segmentos diferentes, mas a lógica é a mesma: estratégia sob medida, execução consistente e resultado que se mede.</p>
      <div class="seg-grid">
        <?php
        $segments = array(
          array('title' => 'Shopping Centers', 'slug' => 'shopping-centers', 'desc' => 'Campanhas sazonais, conteúdo institucional e gestão de redes sociais para grandes centros comerciais de Manaus.'),
          array('title' => 'Saúde e Estética', 'slug' => 'saude-estetica', 'desc' => 'Posicionamento digital para médicos, clínicas e profissionais de saúde. Conteúdo com autoridade e campanhas dentro das normas do CFM.'),
          array('title' => 'Varejo e Comércio', 'slug' => 'varejo', 'desc' => 'Tráfego pago para lojas físicas e e-commerce. Campanhas de conversão, remarketing e conteúdo para gerar vendas recorrentes.'),
          array('title' => 'Gastronomia', 'slug' => 'gastronomia', 'desc' => 'Gestão de redes sociais para restaurantes, bares e delivery. Conteúdo visual, promoções e campanhas de alcance local em Manaus.'),
          array('title' => 'Serviços e Profissionais', 'slug' => 'servicos-profissionais', 'desc' => 'Posicionamento digital para advogados, contadores, arquitetos e outros profissionais que precisam de autoridade online.'),
          array('title' => 'Turismo e Hotelaria', 'slug' => 'turismo-hotelaria', 'desc' => 'Campanhas para pousadas, hotéis e operadoras de turismo na região amazônica. Google Ads, redes sociais e conteúdo de destino.'),
        );
        foreach ($segments as $seg) : ?>
        <div class="seg-card rv">
          <h4><a href="<?php echo home_url('/' . $seg['slug'] . '/'); ?>"><?php echo $seg['title']; ?></a></h4>
          <p><?php echo $seg['desc']; ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- SOBRE -->
  <section id="sobre" class="lt sp" aria-label="Sobre a Core Digital">
    <div class="cn"><div class="ab-lay">
      <div class="ab-vis rv"><img src="<?php echo coredigital_logo_vert_url(); ?>" alt="Core Digital" loading="lazy" decoding="async" width="140" height="140"></div>
      <div class="ab-t">
        <div class="ey rv">Sobre</div>
        <h2 class="rv">Uma agência de Manaus que entrega resultado, não PowerPoint bonito</h2>
        <p class="rv">A Core Digital existe porque o mercado de Manaus precisa de agência que faz, não de agência que promete. Nascemos para atender negócios que já têm qualidade no que fazem e precisam de presença digital à altura.</p>
        <p class="rv">Estratégia, conteúdo e performance. Acompanhamento de perto, relatórios abertos, decisões baseadas em dado. Sem contrato de gaveta, sem entrega genérica.</p>
        <div class="ab-v">
          <div class="vp rv"><h4>Estratégia primeiro</h4><p>Toda ação tem um porquê</p></div>
          <div class="vp rv"><h4>Dado aberto</h4><p>Você vê tudo, sempre</p></div>
          <div class="vp rv"><h4>Resultado real</h4><p>Métrica acima de vaidade</p></div>
          <div class="vp rv"><h4>Atendimento direto</h4><p>Sem SAC, sem intermediário</p></div>
        </div>
      </div>
    </div></div>
  </section>

  <!-- CLIENTES -->
  <section id="clientes" class="sp dk" aria-label="Clientes da Core Digital em Manaus">
    <div class="cn">
      <div class="ey rv">Clientes</div>
      <h2 class="st rv">Marcas que confiam<br>na Core Digital</h2>
      <p class="sd rv">Shopping centers, clínicas e negócios locais em Manaus e região Norte. Soluções sob medida para cada realidade.</p>
      <div class="cl-row">
        <div class="cl rv">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ponta-negra.png" alt="Shopping Ponta Negra" class="cl-logo" loading="lazy" decoding="async" width="120" height="60">
          <h4>Shopping Ponta Negra</h4>
          <span>Varejo &bull; Shopping Center</span>
        </div>
        <div class="cl rv">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/vianorte.png" alt="Shopping Manaus ViaNorte" class="cl-logo" loading="lazy" decoding="async" width="120" height="60">
          <h4>Shopping Manaus ViaNorte</h4>
          <span>Varejo &bull; Shopping Center</span>
        </div>
        <div class="cl rv">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/patio-roraima.png" alt="Shopping Pátio Roraima" class="cl-logo" loading="lazy" decoding="async" width="120" height="60">
          <h4>Shopping Pátio Roraima</h4>
          <span>Varejo &bull; Shopping Center</span>
        </div>
        <div class="cl rv">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dr-euler.png" alt="Dr. Euler Ribeiro Filho" class="cl-logo" loading="lazy" decoding="async" width="120" height="60">
          <h4>Dr. Euler Ribeiro Filho</h4>
          <span>Saúde &bull; Cirurgia Plástica</span>
        </div>
      </div>
    </div>
  </section>

  <!-- PROCESSO -->
  <section id="processo" class="lt sp" aria-label="Processo de trabalho">
    <div class="cn">
      <div class="sh-row rv">
        <div><div class="ey">Processo</div><h2 class="st">Como trabalhamos</h2></div>
        <p class="sd">Direto. Sem burocracia. Da conversa inicial à execução com acompanhamento contínuo e dados na mesa.</p>
      </div>
      <div class="pg">
        <div class="ps rv"><div class="ps-n">01</div><h3>Diagnóstico</h3><p>Entendemos seu momento, público e objetivos. Analisamos o que existe e o que falta.</p></div>
        <div class="ps rv"><div class="ps-n">02</div><h3>Estratégia</h3><p>Plano de ação com canais, formatos e investimento dimensionados para o seu contexto.</p></div>
        <div class="ps rv"><div class="ps-n">03</div><h3>Execução</h3><p>Conteúdo, campanhas, gestão de canais. Rodando com consistência e ajuste diário.</p></div>
        <div class="ps rv"><div class="ps-n">04</div><h3>Otimização</h3><p>Dados analisados, ajustes feitos, resultados reportados. Ciclo contínuo de melhoria.</p></div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq" class="sp dk" aria-label="Perguntas frequentes sobre marketing digital em Manaus">
    <div class="cn">
      <div style="text-align:center"><div class="ey rv" style="justify-content:center">Perguntas Frequentes</div><h2 class="st rv">O que você precisa saber antes<br>de conversar com a gente</h2></div>
      <div class="fw">
        <?php
        $faqs = array(
          array('q' => 'Qual o investimento mínimo em tráfego pago?', 'a' => 'Depende do objetivo e do segmento. Trabalhamos com orçamentos acessíveis para pequenos e médios negócios em Manaus. Na primeira conversa, definimos juntos o valor que faz sentido.'),
          array('q' => 'Vocês atendem fora de Manaus?', 'a' => 'Sim. Foco em Manaus e região Norte, mas já atendemos Roraima e outras localidades. Gestão de tráfego e conteúdo funcionam bem de forma remota.'),
          array('q' => 'Qual a diferença entre gestão de redes e tráfego pago?', 'a' => 'Redes sociais cuida do orgânico: posts, stories, editorial. Tráfego pago são campanhas em Meta Ads e Google Ads para alcançar mais gente e converter. Os dois se complementam.'),
          array('q' => 'Em quanto tempo vejo resultado?', 'a' => 'Tráfego pago gera resultado na primeira semana. Posicionamento e conteúdo levam 60 a 90 dias para consolidar. Somos transparentes com prazos desde o primeiro dia.'),
          array('q' => 'Vocês fazem gestão de Instagram?', 'a' => 'Sim. Planejamento editorial completo, criação de conteúdo (Reels, carrosséis, stories), legendas estratégicas e gestão diária. Tudo alinhado com a identidade da marca.'),
          array('q' => 'Vocês entregam relatórios?', 'a' => 'Todo mês. Relatório completo com alcance, engajamento, investimento, conversões e análise de performance. Dado aberto, sem enrolação.'),
        );
        foreach ($faqs as $faq) : ?>
        <div class="fi">
          <button class="fq"><?php echo $faq['q']; ?><span class="fp"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span></button>
          <div class="fa"><p><?php echo $faq['a']; ?></p></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- INSTAGRAM -->
  <section class="ig-section" id="instagram" aria-label="Instagram da Core Digital">
    <div class="cn">
      <div class="ig-top">
        <div>
          <div class="ey rv">Instagram</div>
          <h2 class="rv">O que estamos<br>fazendo <span>por aí</span></h2>
        </div>
        <a href="https://www.instagram.com/coredigital.co/" class="ig-handle-link rv" target="_blank" rel="noopener noreferrer">
          @coredigital.co
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
        </a>
      </div>
      <div class="ig-feed-wrap rv">
        <?php if ( shortcode_exists( 'instagram-feed' ) ) : ?>
          <?php echo do_shortcode('[instagram-feed num=6 cols=6 showheader=false showfollow=false showbutton=false]'); ?>
        <?php else : ?>
          <div class="ig-feed-empty">Conecte o plugin Instagram Feed para exibir os últimos posts aqui.</div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta" id="contato" aria-label="Contato com a Core Digital">
    <div class="cn">
      <div class="ey rv" style="justify-content:center">Contato</div>
      <h2 class="rv">Vamos colocar sua marca<br><span class="grn">no lugar certo</span></h2>
      <p class="rv">Sem compromisso. Sem roteiro de venda. Uma conversa para entender seu momento e mostrar o que podemos fazer.</p>
      <a href="https://wa.me/<?php echo coredigital_whatsapp(); ?>" class="btn-d rv" target="_blank" rel="noopener noreferrer">
        Falar pelo WhatsApp
        <svg class="arrow-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </section>

<?php get_footer(); ?>
