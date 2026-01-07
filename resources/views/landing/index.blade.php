@extends('layouts.landing')

@section('title', 'Portal Majestic - Kelurahan Ambarketawang')

@section('styles')
<style>
  :root{
    --maroon:#3a0000;
    --accent:#8B0000;
    --gold:#d4af37;
    --gold-soft:#f5d18a;
    --ivory:#fffbea;
  }

  *{box-sizing:border-box;margin:0;padding:0}
  html,body{height:100%}
  body{
    font-family:'Poppins',sans-serif;
    background: radial-gradient(circle at 20% 10%, rgba(139,0,0,0.12), transparent 10%),
                linear-gradient(180deg, var(--maroon) 0%, #120000 100%);
    color:var(--ivory);
    overflow:hidden;
    display:flex;
    align-items:center;
    justify-content:center;
  }

  .scene {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
  }

  .door{
    position:absolute;
    top:0;
    width:50%;
    height:100%;
    z-index:8;
    background:linear-gradient(180deg,rgba(139,0,0,0.98),rgba(90,0,0,0.95));
    box-shadow:inset 0 0 80px rgba(0,0,0,0.6),0 30px 80px rgba(0,0,0,0.8);
    transform-origin:left center;
    transition:transform 1.2s cubic-bezier(.2,.9,.2,1),opacity .4s ease;
  }
  .door.right{right:0;left:auto;transform-origin:right center;}
  .door.left{left:0;transform:rotateY(0deg);border-right:1px solid rgba(0,0,0,0.2)}
  .door.right{right:0;transform:rotateY(0deg);border-left:1px solid rgba(0,0,0,0.2)}
  .scene.open .door.left{transform:rotateY(-95deg);}
  .scene.open .door.right{transform:rotateY(95deg);}

  .center{
    position:relative;
    z-index:5;
    text-align:center;
    width:100%;
    max-width:760px;
    padding:0 20px;
    pointer-events:none;
    opacity:0;
    transform:translateY(12px) scale(.98);
    transition:all .9s cubic-bezier(.2,.9,.2,1);
  }
  .scene.content-visible .center{
    opacity:1;transform:translateY(0) scale(1);pointer-events:auto;
  }

  .logo-wrap{
    display:flex;
    justify-content:center;
    margin-bottom:18px;
    filter:drop-shadow(0 10px 30px rgba(0,0,0,0.7));
  }
  .logo{
    width:170px;
    height:auto;
    border-radius:12px;
    transform:translateY(30px) scale(.9);
    opacity:0;
    transition:all .9s ease;
    box-shadow:0 0 35px rgba(212,175,55,0.15);
  }
  .scene.logo-visible .logo{
    transform:translateY(0) scale(1);
    opacity:1;
    filter:drop-shadow(0 0 30px rgba(212,175,55,0.9));
  }

  .title{
    font-family:'Playfair Display',serif;
    font-size:clamp(34px,6vw,56px);
    color:var(--ivory);
    letter-spacing:2px;
    margin-top:6px;
    margin-bottom:6px;
    text-shadow:0 8px 30px rgba(212,175,55,0.55);
    min-height:3.1rem;
  }

  .subtitle{
    color:rgba(255,250,235,0.86);
    font-size:16px;
    margin-top:8px;
    opacity:0;
    transform:translateY(6px);
    transition:all .6s ease;
  }
  .scene.content-visible .subtitle{
    opacity:0.95;transform:none;transition-delay:.15s
  }

  .login-btn{
    margin-top:28px;
    padding:12px 36px;
    border-radius:30px;
    border:2px solid rgba(212,175,55,0.95);
    background:linear-gradient(180deg,var(--ivory),#fff6db);
    color:var(--accent);
    font-weight:600;
    cursor:pointer;
    display:inline-block;
    opacity:0;
    transform:translateY(6px);
    transition:all .5s ease;
    box-shadow:0 10px 30px rgba(0,0,0,0.35),0 0 18px rgba(212,175,55,0.12) inset;
  }
  .scene.login-visible .login-btn{opacity:1;transform:none}

  .rays{
    position:absolute;
    width:520px;height:520px;
    pointer-events:none;z-index:4;
    filter:blur(18px);
    opacity:0;transform:scale(.9);
    transition:all .8s ease;
  }
  .scene.logo-visible .rays{opacity:1;transform:scale(1);transition-delay:.15s}
  .rays span{
    position:absolute;left:50%;top:50%;
    width:6px;height:160px;
    background:linear-gradient(180deg,rgba(212,175,55,0.95),rgba(255,255,255,0.02));
    transform-origin:50% 100%;
    opacity:.9;
  }
  .rays span:nth-child(1){transform:translate(-50%,-50%) rotate(0deg)}
  .rays span:nth-child(2){transform:translate(-50%,-50%) rotate(25deg)}
  .rays span:nth-child(3){transform:translate(-50%,-50%) rotate(50deg)}
  .rays span:nth-child(4){transform:translate(-50%,-50%) rotate(335deg)}
  .rays span:nth-child(5){transform:translate(-50%,-50%) rotate(310deg)}

  .particles{
    position:absolute;inset:0;z-index:3;pointer-events:none;
  }
  .particles span{
    position:absolute;
    bottom:-10%;
    width:6px;height:6px;border-radius:50%;
    background:rgba(212,175,55,0.9);
    box-shadow:0 0 12px rgba(212,175,55,0.9);
    animation:rise linear infinite;
    opacity:0;
  }
  .particles span:nth-child(1){left:6%;animation-duration:12s;animation-delay:0s;transform:scale(.8)}
  .particles span:nth-child(2){left:18%;animation-duration:10s;animation-delay:1.5s;transform:scale(.6)}
  .particles span:nth-child(3){left:30%;animation-duration:14s;animation-delay:.7s;transform:scale(.9)}
  .particles span:nth-child(4){left:44%;animation-duration:11s;animation-delay:2s;transform:scale(.5)}
  .particles span:nth-child(5){left:55%;animation-duration:13s;animation-delay:1s;transform:scale(.7)}
  .particles span:nth-child(6){left:68%;animation-duration:9s;animation-delay:3s;transform:scale(.6)}
  .particles span:nth-child(7){left:80%;animation-duration:15s;animation-delay:.3s;transform:scale(.85)}
  .particles span:nth-child(8){left:92%;animation-duration:12s;animation-delay:2.3s;transform:scale(.65)}
  .particles span:nth-child(9){left:60%;animation-duration:18s;animation-delay:1.1s;transform:scale(.5)}
  .particles span:nth-child(10){left:38%;animation-duration:16s;animation-delay:.5s;transform:scale(.4)}

  @keyframes rise{
    0%{transform:translateY(0) scale(0.2);opacity:0}
    10%{opacity:0.6}
    50%{opacity:0.95;transform:translateY(-40vh) scale(1)}
    100%{transform:translateY(-110vh) scale(.6);opacity:0}
  }

  @media (max-width:720px){
    .title{font-size:clamp(28px,8vw,40px);}
    .logo{width:130px}
    .rays{width:360px;height:360px}
  }
</style>
@endsection

@section('content')
<div class="scene">
  <div class="door left"></div>
  <div class="door right"></div>

  <div class="rays">
    <span></span><span></span><span></span><span></span><span></span>
  </div>

  <div class="center" aria-hidden="false">
    <div class="logo-wrap">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo" />
    </div>
    <h1 id="title" class="title"></h1>
    <p class="subtitle">Kelurahan Ambarketawang</p>
    <button id="loginBtn" class="login-btn" onclick="goToDashboard()">Login</button>
  </div>

  <div class="particles" aria-hidden="true">
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
  </div>
</div>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const scene = document.querySelector('.scene');
    const titleEl = document.getElementById('title');
    const loginBtn = document.getElementById('loginBtn');

    setTimeout(() => { scene.classList.add('open'); }, 600);
    setTimeout(() => { scene.classList.add('logo-visible'); }, 1800);
    setTimeout(() => { scene.classList.add('content-visible'); }, 2300);

    const text = 'Welcome Admin';
    let i = 0;
    function type() {
      if (i < text.length) {
        titleEl.textContent += text.charAt(i);
        i++;
        const speed = (i < 2) ? 220 : 90;
        setTimeout(type, speed);
      } else {
        setTimeout(() => { scene.classList.add('login-visible'); }, 400);
      }
    }
    setTimeout(type, 2600);

    loginBtn.addEventListener('click', (e) => {
      e.preventDefault();
      const orig = loginBtn.style.boxShadow;
      loginBtn.style.transform = 'scale(0.98)';
      loginBtn.style.boxShadow = '0 0 40px rgba(212,175,55,0.8)';
      setTimeout(() => {
        loginBtn.style.transform = '';
        loginBtn.style.boxShadow = orig;
        window.location.href = "{{ route('login') }}";
      }, 260);
    });
  });
</script>
@endsection
