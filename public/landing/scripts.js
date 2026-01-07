document.addEventListener('DOMContentLoaded', () => {
  const scene = document.querySelector('.scene');
  const titleEl = document.getElementById('title');
  const loginBtn = document.getElementById('loginBtn');

  // 1) buka pintu
  setTimeout(() => scene.classList.add('open'), 600);

  // 2) tampilkan logo & sinar
  setTimeout(() => scene.classList.add('logo-visible'), 1800);

  // 3) munculkan konten tengah
  setTimeout(() => scene.classList.add('content-visible'), 2300);

  // 4) efek ketik teks
  const text = 'Welcome Admin';
  let i = 0;
  function type() {
    if (i < text.length) {
      titleEl.textContent += text.charAt(i);
      i++;
      const speed = (i < 2) ? 220 : 90;
      setTimeout(type, speed);
    } else {
      setTimeout(() => scene.classList.add('login-visible'), 400);
    }
  }
  setTimeout(type, 2600);

  // 5) efek klik tombol login
  loginBtn.addEventListener('click', (e) => {
    e.preventDefault();
    const orig = loginBtn.style.boxShadow;
    loginBtn.style.transform = 'scale(0.98)';
    loginBtn.style.boxShadow = '0 0 40px rgba(212,175,55,0.8)';
    setTimeout(() => {
      loginBtn.style.transform = '';
      loginBtn.style.boxShadow = orig;
      // arahkan ke route login Laravel
      window.location.href = '/login';
      // atau gunakan route helper di Blade dengan data-attr
    }, 260);
  });
});
