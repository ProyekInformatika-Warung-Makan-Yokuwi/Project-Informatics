<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<section class="min-vh-100 d-flex align-items-center justify-content-center py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);">
  <!-- Background Pattern -->
  <div class="background-pattern"></div>

  <!-- Enhanced Animated background particles -->
  <div class="particles">
    <div class="particle particle1">🎉</div>
    <div class="particle particle2">✨</div>
    <div class="particle particle3">💫</div>
    <div class="particle particle4">🎊</div>
    <div class="particle particle5">⭐</div>
    <div class="particle particle6">🌟</div>
    <div class="particle particle7">🎈</div>
    <div class="particle particle8">💎</div>
    <div class="particle particle9">🌈</div>
    <div class="particle particle10">🎁</div>
  </div>

  <!-- Confetti Animation -->
  <div class="confetti-container">
    <div class="confetti confetti1"></div>
    <div class="confetti confetti2"></div>
    <div class="confetti confetti3"></div>
    <div class="confetti confetti4"></div>
    <div class="confetti confetti5"></div>
    <div class="confetti confetti6"></div>
    <div class="confetti confetti7"></div>
    <div class="confetti confetti8"></div>
  </div>

  <!-- Floating Decorative Elements -->
  <div class="floating-elements">
    <div class="floating-heart">💚</div>
    <div class="floating-star">⭐</div>
    <div class="floating-sparkle">✨</div>
  </div>

  <div class="container text-center position-relative">

    <!-- 🎁 Main card -->
    <div class="card border-0 shadow-lg p-5 rounded-5 mx-auto bg-white"
         style="max-width: 550px; z-index: 5; animation: fadeInUp 0.8s ease-out;">
      
      <!-- ✅ Animated success icon -->
      <div class="success-icon mb-4 mx-auto">
        <div class="circle bg-success d-flex align-items-center justify-content-center pulse-glow">
          <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="white" viewBox="0 0 24 24">
            <path d="M20.285 6.709a1 1 0 0 0-1.414-1.418l-9.192 9.193-4.243-4.243a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l9.849-9.846z"/>
          </svg>
        </div>
      </div>

      <h1 class="fw-bold text-success mb-3">Pembayaran Berhasil!</h1>
      <p class="text-muted mb-4">
        Terima kasih telah berbelanja di <strong>Yokuwi</strong>!<br>
        Pesanan Anda sedang kami proses dengan penuh cinta 💚.
      </p>

      <div class="bg-light p-4 rounded-4 mb-4 border">
        <h5 class="fw-semibold text-secondary mb-2">Status Pembayaran</h5>
        <p class="fs-5 text-danger fw-bold mb-1"><?= esc($status) ?></p>
        <p class="text-muted">Metode: <strong><?= esc(ucfirst($metode)) ?></strong></p>
      </div>

      <div class="d-flex flex-column gap-3 mt-3">
        <a href="/menu" class="btn btn-danger rounded-pill px-5 py-2 fw-semibold shadow-sm">
          ← Kembali ke Menu
        </a>
        <a href="/pesanan" class="btn btn-outline-success rounded-pill px-5 py-2 fw-semibold shadow-sm">
          📦 Lihat Status Pesanan
        </a>
      </div>
    </div>
  </div>
</section>

<style>
  /* --- Background Pattern --- */
  .background-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image:
      radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 0%, transparent 50%),
      radial-gradient(circle at 75% 75%, rgba(255,255,255,0.1) 0%, transparent 50%);
    opacity: 0.3;
    z-index: 1;
  }

  /* --- Enhanced Particles --- */
  .particles {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    z-index: 2;
  }

  .particle {
    position: absolute;
    font-size: 2rem;
    animation: floatParticle 6s ease-in-out infinite;
    opacity: 0.7;
  }

  .particle1 { top: 10%; left: 10%; animation-delay: 0s; }
  .particle2 { top: 20%; right: 15%; animation-delay: 1s; }
  .particle3 { top: 60%; left: 20%; animation-delay: 2s; }
  .particle4 { top: 40%; right: 10%; animation-delay: 3s; }
  .particle5 { top: 80%; left: 30%; animation-delay: 4s; }
  .particle6 { top: 30%; right: 25%; animation-delay: 5s; }
  .particle7 { top: 70%; left: 50%; animation-delay: 0.5s; }
  .particle8 { top: 15%; right: 40%; animation-delay: 1.5s; }
  .particle9 { top: 85%; left: 70%; animation-delay: 2.5s; }
  .particle10 { top: 50%; right: 60%; animation-delay: 3.5s; }

  @keyframes floatParticle {
    0%, 100% {
      transform: translateY(0) rotate(0deg) scale(1);
      opacity: 0.7;
    }
    25% {
      transform: translateY(-20px) rotate(90deg) scale(1.1);
      opacity: 1;
    }
    50% {
      transform: translateY(-40px) rotate(180deg) scale(0.9);
      opacity: 0.8;
    }
    75% {
      transform: translateY(-20px) rotate(270deg) scale(1.05);
      opacity: 0.9;
    }
  }

  /* --- Confetti Animation --- */
  .confetti-container {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    z-index: 3;
  }

  .confetti {
    position: absolute;
    width: 10px;
    height: 10px;
    background: linear-gradient(45deg, #ff6b6b, #ffd93d, #6bcf7f, #4d96ff, #9b59b6);
    animation: fallConfetti 5s linear infinite;
    border-radius: 2px;
  }

  .confetti1 { left: 10%; animation-delay: 0s; }
  .confetti2 { left: 20%; animation-delay: 0.5s; }
  .confetti3 { left: 30%; animation-delay: 1s; }
  .confetti4 { left: 40%; animation-delay: 1.5s; }
  .confetti5 { left: 50%; animation-delay: 2s; }
  .confetti6 { left: 60%; animation-delay: 2.5s; }
  .confetti7 { left: 70%; animation-delay: 3s; }
  .confetti8 { left: 80%; animation-delay: 3.5s; }

  @keyframes fallConfetti {
    0% {
      top: -10px;
      transform: rotate(0deg) scale(1);
      opacity: 1;
    }
    100% {
      top: 100vh;
      transform: rotate(720deg) scale(0.5);
      opacity: 0;
    }
  }

  /* --- Floating Decorative Elements --- */
  .floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    z-index: 4;
  }

  .floating-heart, .floating-star, .floating-sparkle {
    position: absolute;
    font-size: 1.5rem;
    animation: gentleFloat 4s ease-in-out infinite;
    opacity: 0.6;
  }

  .floating-heart {
    top: 25%;
    right: 20%;
    animation-delay: 0s;
  }

  .floating-star {
    top: 60%;
    left: 15%;
    animation-delay: 1.5s;
  }

  .floating-sparkle {
    top: 45%;
    right: 35%;
    animation-delay: 3s;
  }

  @keyframes gentleFloat {
    0%, 100% {
      transform: translateY(0) rotate(0deg);
      opacity: 0.6;
    }
    50% {
      transform: translateY(-15px) rotate(180deg);
      opacity: 0.9;
    }
  }

  /* --- Fade In Card --- */
  @keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
  }

  /* --- Enhanced Success Icon --- */
  .success-icon .circle {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    box-shadow: 0 0 30px rgba(76,175,80,0.5);
    animation: bounceIn 1s ease-out, pulseGlow 2s ease-in-out infinite 1s;
  }

  @keyframes bounceIn {
    0% {
      transform: scale(0.3);
      opacity: 0;
    }
    50% {
      transform: scale(1.05);
    }
    70% {
      transform: scale(0.9);
    }
    100% {
      transform: scale(1);
      opacity: 1;
    }
  }

  @keyframes pulseGlow {
    0%, 100% {
      box-shadow: 0 0 30px rgba(76,175,80,0.5);
    }
    50% {
      box-shadow: 0 0 50px rgba(76,175,80,0.8);
    }
  }

  /* --- Enhanced Buttons with Ripple Effect --- */
  .btn-danger, .btn-outline-success {
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    transform-style: preserve-3d;
  }

  .btn-danger::before, .btn-outline-success::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transition: width 0.6s, height 0.6s;
    transform: translate(-50%, -50%);
    z-index: 0;
  }

  .btn-danger:hover::before, .btn-outline-success:hover::before {
    width: 300px;
    height: 300px;
  }

  .btn-danger:hover {
    background-color: #b91d2a;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 10px 25px rgba(185, 29, 42, 0.3);
  }

  .btn-outline-success:hover {
    background-color: #198754;
    color: white;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 10px 25px rgba(25, 135, 84, 0.3);
  }

  .btn-danger span, .btn-outline-success span {
    position: relative;
    z-index: 1;
  }

  /* --- Order Processing Progress --- */
  .order-progress {
    animation: slideInUp 0.8s ease-out 0.5s both;
  }

  .progress {
    background: rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
  }

  .progress-fill {
    background: linear-gradient(90deg, #28a745, #20c997, #17a2b8);
    background-size: 200% 100%;
    animation: progressFill 3s ease-out 1s forwards, shimmer 2s ease-in-out infinite 4s;
    border-radius: 10px;
  }

  @keyframes progressFill {
    0% { width: 0%; }
    100% { width: 100%; }
  }

  @keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
  }

  .progress-text {
    animation: countUp 3s ease-out 1s forwards;
    font-variant-numeric: tabular-nums;
  }

  @keyframes countUp {
    0% { content: "0%"; }
    100% { content: "100%"; }
  }

  /* --- Responsive Adjustments --- */
  @media (max-width: 768px) {
    .particle {
      font-size: 1.5rem;
    }

    .floating-heart, .floating-star, .floating-sparkle {
      font-size: 1.2rem;
    }

    .confetti {
      width: 8px;
      height: 8px;
    }
  }
</style>

<script>
// Progress bar animation with counter
document.addEventListener('DOMContentLoaded', function() {
  const progressBar = document.querySelector('.progress-fill');
  const progressText = document.querySelector('.progress-text');

  // Animate progress bar
  setTimeout(() => {
    progressBar.style.width = '100%';
  }, 1000);

  // Animate counter
  let counter = 0;
  const target = 100;
  const duration = 3000; // 3 seconds
  const increment = target / (duration / 50);

  const timer = setInterval(() => {
    counter += increment;
    if (counter >= target) {
      counter = target;
      clearInterval(timer);
    }
    progressText.textContent = Math.floor(counter) + '%';
  }, 50);

  // Add some sparkle effect to the progress bar
  setTimeout(() => {
    progressBar.style.animation = 'progressFill 3s ease-out forwards, shimmer 2s ease-in-out infinite';
  }, 4000);
});
</script>

<?= $this->endSection() ?>
