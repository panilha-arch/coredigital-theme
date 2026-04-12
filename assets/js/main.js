// Scroll reveal
const ro = new IntersectionObserver(e => {
  e.forEach(e => { if (e.isIntersecting) e.target.classList.add('v'); });
}, { threshold: .08, rootMargin: '0px 0px -80px 0px' });
document.querySelectorAll('.rv').forEach(el => ro.observe(el));

// Nav scroll
window.addEventListener('scroll', () => {
  document.querySelector('nav.main-nav').classList.toggle('s', window.scrollY > 100);
});

// Counter animation
const co = new IntersectionObserver(e => {
  e.forEach(en => {
    if (!en.isIntersecting) return;
    const el = en.target;
    if (el.dataset.text === 'true') return;
    const t = +el.dataset.target, s = el.dataset.suffix || '', d = 2000, st = performance.now();
    function tk(n) {
      const p = Math.min((n - st) / d, 1), ease = 1 - Math.pow(1 - p, 4);
      el.textContent = Math.round(t * ease) + s;
      if (p < 1) requestAnimationFrame(tk);
    }
    requestAnimationFrame(tk);
    co.unobserve(el);
  });
}, { threshold: .5 });
document.querySelectorAll('.sb-n').forEach(el => co.observe(el));

// FAQ accordion
document.querySelectorAll('.fq').forEach(b => {
  b.addEventListener('click', () => {
    const i = b.parentElement, o = i.classList.contains('open');
    document.querySelectorAll('.fi').forEach(x => x.classList.remove('open'));
    if (!o) i.classList.add('open');
  });
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href*="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const href = a.getAttribute('href');
    const hash = href.includes('#') ? '#' + href.split('#')[1] : null;
    if (!hash || hash === '#') return;
    const t = document.querySelector(hash);
    if (t) {
      e.preventDefault();
      t.scrollIntoView({ behavior: 'smooth', block: 'start' });
      const nl = document.getElementById('nl');
      if (nl) nl.classList.remove('open');
    }
  });
});
