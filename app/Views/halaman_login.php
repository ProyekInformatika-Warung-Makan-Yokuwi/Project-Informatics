<?php $this->setVar('title', 'Login - Yokuwi'); ?>
<?= $this->extend('layouts/layout_modern') ?>
<?= $this->section('content') ?>

<!-- Login Hero Section -->
<section class="login-hero-section position-relative overflow-hidden">
  <div class="container position-relative">
    <div class="row align-items-center min-vh-75">
      <div class="col-12">
        <div class="login-container">
          <div class="card shadow p-4 login-card">
            <h3 class="text-center text-danger fw-bold mb-3">Login Admin</h3>

            <?php if (session()->getFlashdata('error')): ?>
              <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
              <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('login/process') ?>" method="post">
              <?= csrf_field() ?>

              <div class="mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
              </div>

              <div class="mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
              </div>

              <button type="submit" class="btn btn-danger w-100 fw-bold">MASUK</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Login Hero Section Enhancements */
.login-hero-section {
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--primary-light) 100%);
  min-height: 100vh;
  display: flex;
  align-items: center;
  position: relative;
  overflow: hidden;
}

/* Dark Mode Login Hero Section */
[data-theme="dark"] .login-hero-section {
  background: linear-gradient(135deg, var(--secondary-dark) 0%, var(--secondary-color) 50%, var(--primary-dark) 100%);
}

.login-bg-gradient::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
              radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
}

.floating-shapes .shape {
  position: absolute;
  border-radius: 50%;
  background: rgba(255,255,255,0.1);
  animation: float 6s ease-in-out infinite;
}

.shape-1 {
  width: 80px;
  height: 80px;
  top: 10%;
  left: 10%;
  animation-delay: 0s;
}

.shape-2 {
  width: 60px;
  height: 60px;
  top: 60%;
  right: 15%;
  animation-delay: 2s;
}

.shape-3 {
  width: 100px;
  height: 100px;
  bottom: 20%;
  left: 20%;
  animation-delay: 4s;
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

/* Enhanced Login Container */
.login-container {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem 1rem;
}

/* Enhanced Login Card */
.login-card {
  width: 100%;
  max-width: 420px;
  border-radius: 24px;
  box-shadow: var(--shadow-xl);
  border: none;
  overflow: hidden;
  backdrop-filter: blur(20px);
  background: rgba(255, 255, 255, 0.95);
  position: relative;
}

/* Dark Mode Login Card */
[data-theme="dark"] .login-card {
  background: rgba(45, 45, 45, 0.95);
  border: 1px solid rgba(255, 255, 255, 0.1);
}

/* Login Card Header */
.card-header {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  color: white;
  padding: 2rem 1.5rem 1.5rem;
  border-bottom: none;
  position: relative;
  overflow: hidden;
}

.card-header::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
  animation: rotate 20s linear infinite;
}

@keyframes rotate {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

.login-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 60px;
  height: 60px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  font-size: 1.5rem;
  backdrop-filter: blur(10px);
  border: 2px solid rgba(255, 255, 255, 0.3);
}

.card-header h3 {
  position: relative;
  z-index: 1;
  color: white !important;
  margin-bottom: 0.5rem;
}

.card-header p {
  position: relative;
  z-index: 1;
  color: rgba(255, 255, 255, 0.9) !important;
}

/* Enhanced Form Elements */
.form-floating {
  position: relative;
}

.form-control {
  border: 2px solid rgba(0, 0, 0, 0.1);
  border-radius: 12px;
  padding: 1rem 1rem 1rem 3rem;
  font-size: 1rem;
  transition: all 0.3s ease;
  background: rgba(255, 255, 255, 0.9);
  backdrop-filter: blur(10px);
}

.form-control:focus {
  border-color: var(--primary-color);
  box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
  background: white;
  transform: translateY(-2px);
}

/* Dark Mode Form Controls */
[data-theme="dark"] .form-control {
  background: rgba(26, 26, 26, 0.9);
  border-color: rgba(255, 255, 255, 0.2);
  color: var(--text-primary);
}

[data-theme="dark"] .form-control:focus {
  background: var(--input-bg);
  border-color: var(--primary-color);
  color: var(--text-primary);
}

[data-theme="dark"] .form-control::placeholder {
  color: var(--text-muted);
}

/* Form Labels */
.form-floating label {
  padding-left: 2.5rem;
  font-weight: 500;
  color: var(--text-secondary);
}

.form-control:focus ~ label,
.form-control:not(:placeholder-shown) ~ label {
  color: var(--primary-color);
  font-weight: 600;
}

/* Enhanced Login Button */
.btn-login {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  border: none;
  border-radius: 12px;
  font-size: 1.1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  position: relative;
  overflow: hidden;
  transition: all 0.3s ease;
  box-shadow: var(--shadow-md);
}

.btn-login::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.6s;
}

.btn-login:hover::before {
  left: 100%;
}

.btn-login:hover {
  background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
  transform: translateY(-3px);
  box-shadow: var(--shadow-xl);
  color: white;
}

/* Card Footer */
.card-footer {
  background: rgba(248, 249, 250, 0.8);
  border-top: 1px solid rgba(0, 0, 0, 0.05);
}

/* Dark Mode Card Footer */
[data-theme="dark"] .card-footer {
  background: rgba(26, 26, 26, 0.8);
  border-top-color: rgba(255, 255, 255, 0.1);
}

.card-footer a {
  color: var(--primary-color);
  transition: all 0.3s ease;
}

.card-footer a:hover {
  color: var(--primary-dark);
  text-decoration: underline;
}

/* Enhanced Alerts */
.alert {
  border-radius: 12px;
  border: none;
  font-weight: 500;
  backdrop-filter: blur(10px);
}

.alert-danger {
  background: rgba(220, 53, 69, 0.1);
  border-left: 4px solid var(--danger-color);
  color: var(--danger-color);
}

.alert-success {
  background: rgba(25, 135, 84, 0.1);
  border-left: 4px solid var(--success-color);
  color: var(--success-color);
}

/* Dark Mode Alerts */
[data-theme="dark"] .alert-danger {
  background: rgba(220, 53, 69, 0.2);
  color: #ef4444;
}

[data-theme="dark"] .alert-success {
  background: rgba(25, 135, 84, 0.2);
  color: #22c55e;
}

/* Responsive Design */
@media (max-width: 768px) {
  .login-hero-section {
    min-height: 100vh;
    padding: 1rem 0;
  }

  .login-card {
    max-width: 100%;
    margin: 0 1rem;
    border-radius: 20px;
  }

  .card-header {
    padding: 1.5rem 1rem 1rem;
  }

  .login-icon {
    width: 50px;
    height: 50px;
    font-size: 1.2rem;
  }

  .card-body {
    padding: 1.5rem;
  }

  .form-control {
    padding: 0.875rem 0.875rem 0.875rem 2.5rem;
    font-size: 0.95rem;
  }

  .btn-login {
    font-size: 1rem;
    padding: 0.875rem 1.5rem;
  }

  .shape-1, .shape-2, .shape-3 {
    display: none;
  }
}

@media (max-width: 480px) {
  .login-container {
    padding: 1rem;
  }

  .card-header h3 {
    font-size: 1.5rem;
  }

  .card-header p {
    font-size: 0.8rem;
  }
}

/* Animation Classes */
.animate__fadeIn {
  animation: fadeIn 0.8s ease-out;
}

.animate__delay-1s {
  animation-delay: 0.3s;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Focus States for Accessibility */
.form-control:focus,
.btn-login:focus {
  outline: none;
}

/* Loading State */
.btn-login:disabled {
  opacity: 0.7;
  cursor: not-allowed;
  transform: none;
}
</style>

<?= $this->endSection() ?>
