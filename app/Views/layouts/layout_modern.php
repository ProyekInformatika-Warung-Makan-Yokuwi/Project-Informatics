<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Yokuwi') ?></title>

  <!-- Google Fonts - Modern Typography Stack -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      /* Advanced Color System */
      --primary-color: #e74c3c;
      --primary-dark: #c0392b;
      --primary-light: #ff6b6b;
      --secondary-color: #2c3e50;
      --secondary-dark: #1a252f;
      --accent-color: #f39c12;
      --accent-dark: #e67e22;
      --success-color: #27ae60;
      --warning-color: #f39c12;
      --danger-color: #e74c3c;
      --info-color: #3498db;

      /* Neutral Colors */
      --white: #ffffff;
      --light-bg: #fdf2f2;
      --light-gray: #f8f9fa;
      --medium-gray: #e9ecef;
      --dark-gray: #6c757d;
      --text-primary: #2c3e50;
      --text-secondary: #6c757d;
      --text-muted: #adb5bd;

      /* Advanced Shadows */
      --shadow-xs: 0 1px 2px rgba(231, 76, 60, 0.05);
      --shadow-sm: 0 4px 8px rgba(231, 76, 60, 0.1);
      --shadow-md: 0 8px 16px rgba(231, 76, 60, 0.12);
      --shadow-lg: 0 16px 32px rgba(231, 76, 60, 0.15);
      --shadow-xl: 0 24px 48px rgba(231, 76, 60, 0.18);
      --shadow-glow: 0 0 20px rgba(231, 76, 60, 0.3);

      /* Modern Spacing */
      --spacing-xs: 0.25rem;
      --spacing-sm: 0.5rem;
      --spacing-md: 1rem;
      --spacing-lg: 1.5rem;
      --spacing-xl: 2rem;
      --spacing-2xl: 3rem;
      --spacing-3xl: 4rem;

      /* Border Radius */
      --radius-xs: 4px;
      --radius-sm: 8px;
      --radius-md: 12px;
      --radius-lg: 16px;
      --radius-xl: 20px;
      --radius-2xl: 24px;
      --radius-full: 50%;

      /* Typography */
      --font-primary: 'Inter', sans-serif;
      --font-secondary: 'Poppins', sans-serif;
      --font-size-xs: 0.75rem;
      --font-size-sm: 0.875rem;
      --font-size-base: 1rem;
      --font-size-lg: 1.125rem;
      --font-size-xl: 1.25rem;
      --font-size-2xl: 1.5rem;
      --font-size-3xl: 1.875rem;
      --font-size-4xl: 2.25rem;
      --font-size-5xl: 3rem;

      /* Transitions */
      --transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-normal: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);

      /* Z-index */
      --z-dropdown: 1000;
      --z-sticky: 1020;
      --z-fixed: 1030;
      --z-modal-backdrop: 1040;
      --z-modal: 1050;
      --z-popover: 1060;
      --z-tooltip: 1070;
      --z-toast: 1080;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: var(--font-primary);
      background: linear-gradient(135deg, var(--light-bg) 0%, var(--white) 50%, var(--light-bg) 100%);
      min-height: 100vh;
      color: var(--text-primary);
      line-height: 1.6;
      font-size: var(--font-size-base);
      overflow-x: hidden;
    }

    /* Advanced Navbar */
    .navbar-ultra-modern {
      background: #dc3545;
      padding: var(--spacing-lg) 0;
      box-shadow: var(--shadow-sm);
      transition: var(--transition-normal);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: var(--z-fixed);
      overflow: visible;
    }

    .navbar-ultra-modern.scrolled {
      background: #c82333;
      box-shadow: var(--shadow-md);
      padding: var(--spacing-md) 0;
    }

    .navbar-brand-ultra {
      font-family: var(--font-secondary);
      font-weight: 800;
      font-size: var(--font-size-2xl);
      color: var(--primary-color) !important;
      text-decoration: none;
      position: relative;
      overflow: hidden;
      transition: var(--transition-normal);
    }

    .navbar-brand-ultra::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
      transition: var(--transition-normal);
    }

    .navbar-brand-ultra:hover::before {
      width: 100%;
    }

    .navbar-brand-ultra:hover {
      color: var(--primary-dark) !important;
      transform: translateY(-2px);
    }

    .logo-ultra-modern {
      height: 65px;
      width: auto;
      object-fit: contain;
      filter: drop-shadow(var(--shadow-sm));
      transition: var(--transition-normal);
    }

    .logo-ultra-modern:hover {
      transform: scale(1.05) rotate(5deg);
      filter: drop-shadow(var(--shadow-md));
    }

    /* Ultra Modern Navigation */
    .navbar-nav-ultra .nav-link-ultra {
      font-weight: 600;
      color: white !important;
      padding: var(--spacing-sm) var(--spacing-lg);
      border-radius: var(--radius-lg);
      transition: var(--transition-normal);
      position: relative;
      overflow: hidden;
      font-size: var(--font-size-base);
    }

    .navbar-nav-ultra .nav-link-ultra::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(231, 76, 60, 0.08), transparent);
      transition: left 0.6s;
    }

    .navbar-nav-ultra .nav-link-ultra:hover::before {
      left: 100%;
    }

    .navbar-nav-ultra .nav-link-ultra:hover {
      color: var(--primary-color) !important;
      background: linear-gradient(135deg, rgba(231, 76, 60, 0.03), rgba(243, 156, 18, 0.03));
      transform: translateY(-3px);
      box-shadow: var(--shadow-md);
    }

    /* Ultra Modern Search */
    .navbar-search-center {
      flex: 1;
      max-width: 400px;
      margin: 0 var(--spacing-lg);
    }

    .search-input-group {
      border-radius: var(--radius-xl);
      overflow: hidden;
      box-shadow: var(--shadow-md);
      transition: var(--transition-normal);
    }

    .search-input-group:focus-within {
      box-shadow: var(--shadow-lg);
      transform: scale(1.02);
    }

    .search-input-ultra {
      border: none;
      background: rgba(255, 255, 255, 0.95);
      color: var(--text-primary);
      padding: var(--spacing-md) var(--spacing-lg);
      font-size: var(--font-size-base);
      font-weight: 500;
      border-radius: 0;
    }

    .search-input-ultra:focus {
      background: white;
      color: var(--text-primary);
      box-shadow: none;
    }

    .search-input-ultra::placeholder {
      color: var(--text-muted);
      opacity: 0.8;
    }

    .btn-search-ultra {
      background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
      color: white;
      border: none;
      padding: var(--spacing-md) var(--spacing-lg);
      border-radius: 0;
      transition: var(--transition-normal);
      font-weight: 600;
    }

    .btn-search-ultra:hover {
      background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
      transform: scale(1.05);
      color: white;
    }

    /* Ultra Modern Cart */
    .cart-container-ultra {
      position: relative;
      display: inline-block;
      overflow: visible;
    }

    .cart-icon-ultra {
      font-size: 1.4rem;
      color: white;
      transition: var(--transition-normal);
      padding: var(--spacing-sm);
      border-radius: var(--radius-lg);
      position: relative;
    }

    .cart-icon-ultra:hover {
      color: var(--primary-dark);
      background: linear-gradient(135deg, rgba(231, 76, 60, 0.1), rgba(243, 156, 18, 0.1));
      transform: scale(1.1) rotate(10deg);
      box-shadow: var(--shadow-md);
    }

    .cart-count-ultra {
      position: absolute;
      top: -10px;
      right: -10px;
      background: linear-gradient(135deg, var(--accent-color), var(--accent-dark));
      color: white;
      font-weight: 700;
      border-radius: var(--radius-full);
      padding: 2px 6px;
      font-size: 0.65rem;
      min-width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: var(--shadow-glow);
      animation: pulse-glow 2s infinite;
      border: 2px solid white;
      z-index: 10;
    }

    @keyframes pulse-glow {
      0%, 100% {
        transform: scale(1);
        box-shadow: var(--shadow-glow);
      }
      50% {
        transform: scale(1.1);
        box-shadow: 0 0 30px rgba(243, 156, 18, 0.5);
      }
    }

    /* Ultra Modern User Menu */
    .user-menu-ultra .dropdown-toggle {
      background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
      color: white !important;
      border: none;
      border-radius: var(--radius-xl);
      padding: var(--spacing-sm) var(--spacing-md);
      font-weight: 600;
      transition: var(--transition-normal);
      box-shadow: var(--shadow-sm);
      cursor: pointer;
      text-decoration: none;
    }

    .user-menu-ultra .dropdown-toggle:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
      background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
    }

    .user-avatar-ultra {
      width: 32px;
      height: 32px;
      border-radius: var(--radius-full);
      background: linear-gradient(135deg, var(--accent-color), var(--accent-dark));
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: var(--spacing-sm);
      font-weight: bold;
      color: white;
    }

    .dropdown-menu-ultra {
      border: none;
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-xl);
      padding: var(--spacing-md);
      margin-top: var(--spacing-sm);
      background: white;
      backdrop-filter: blur(20px);
      border: 1px solid rgba(231, 76, 60, 0.1);
      z-index: 1060;
    }

    .dropdown-item-ultra {
      padding: var(--spacing-md);
      border-radius: var(--radius-lg);
      transition: var(--transition-normal);
      font-weight: 500;
      color: var(--text-primary);
    }

    .dropdown-item-ultra:hover {
      background: linear-gradient(135deg, rgba(231, 76, 60, 0.05), rgba(243, 156, 18, 0.05));
      color: var(--primary-color);
      transform: translateX(5px);
    }

    .dropdown-divider-ultra {
      margin: var(--spacing-md) 0;
      border-color: rgba(231, 76, 60, 0.1);
    }

    /* Ultra Modern Offcanvas */
    .offcanvas-ultra-modern {
      width: 320px;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 249, 250, 0.95));
      backdrop-filter: blur(30px) saturate(180%);
      border: 1px solid rgba(231, 76, 60, 0.1);
      box-shadow: var(--shadow-xl);
    }

    .offcanvas-header-ultra {
      background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
      color: white;
      padding: var(--spacing-xl);
      border-radius: var(--radius-xl) var(--radius-xl) 0 0;
      position: relative;
      overflow: hidden;
    }

    .offcanvas-header-ultra::before {
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

    .offcanvas-title-ultra {
      font-weight: 700;
      font-size: var(--font-size-lg);
      position: relative;
      z-index: 1;
    }

    .offcanvas-body-ultra {
      padding: var(--spacing-xl);
    }

    .nav-link-ultra-modern {
      padding: var(--spacing-lg);
      border-radius: var(--radius-xl);
      margin-bottom: var(--spacing-sm);
      transition: var(--transition-normal);
      font-weight: 600;
      color: var(--text-primary);
      text-decoration: none;
      display: flex;
      align-items: center;
      position: relative;
      overflow: hidden;
    }

    .nav-link-ultra-modern::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, rgba(231, 76, 60, 0.05), rgba(243, 156, 18, 0.05));
      transition: left 0.5s;
    }

    .nav-link-ultra-modern:hover::before {
      left: 0;
    }

    .nav-link-ultra-modern:hover {
      background: linear-gradient(135deg, rgba(231, 76, 60, 0.08), rgba(243, 156, 18, 0.08));
      transform: translateX(10px);
      box-shadow: var(--shadow-md);
      color: var(--primary-color);
    }

    .nav-link-ultra-modern i {
      margin-right: var(--spacing-md);
      font-size: var(--font-size-lg);
      width: 24px;
      text-align: center;
    }

    .badge-ultra-modern {
      background: linear-gradient(135deg, var(--danger-color), var(--primary-dark));
      border-radius: var(--radius-full);
      padding: 2px 8px;
      font-size: var(--font-size-xs);
      margin-left: auto;
    }

    /* Main Content */
    main {
      padding-top: 120px;
      min-height: calc(100vh - 200px);
    }

    /* Ultra Modern Footer */
    .footer-ultra-modern {
      background: linear-gradient(135deg, var(--secondary-color), var(--secondary-dark));
      color: white;
      padding: var(--spacing-3xl) 0 var(--spacing-2xl);
      margin-top: var(--spacing-3xl);
      position: relative;
      overflow: hidden;
    }

    .footer-ultra-modern::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 8px;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color), var(--success-color), var(--primary-color));
      box-shadow: 0 4px 20px rgba(231, 76, 60, 0.4);
    }

    .footer-ultra-modern::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 20% 80%, rgba(231, 76, 60, 0.05) 0%, transparent 50%),
                  radial-gradient(circle at 80% 20%, rgba(243, 156, 18, 0.05) 0%, transparent 50%);
      pointer-events: none;
    }

    .footer-content-ultra {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: var(--spacing-2xl);
      margin-bottom: var(--spacing-2xl);
      position: relative;
      z-index: 1;
    }

    .footer-section-ultra h5 {
      color: white;
      font-weight: 700;
      margin-bottom: var(--spacing-lg);
      position: relative;
      font-size: var(--font-size-lg);
    }

    .footer-section-ultra h5::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 0;
      width: 60px;
      height: 4px;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
      border-radius: 2px;
    }

    .footer-section-ultra p {
      color: rgba(255, 255, 255, 0.9);
      line-height: 1.7;
      margin-bottom: var(--spacing-md);
      font-size: var(--font-size-base);
    }

    .footer-links-ultra {
      list-style: none;
      padding: 0;
    }

    .footer-links-ultra li {
      margin-bottom: var(--spacing-md);
    }

    .footer-links-ultra a {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      transition: var(--transition-normal);
      display: inline-block;
      font-weight: 500;
      position: relative;
      overflow: hidden;
    }

    .footer-links-ultra a::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--primary-color);
      transition: var(--transition-normal);
    }

    .footer-links-ultra a:hover::before {
      width: 100%;
    }

    .footer-links-ultra a:hover {
      color: var(--primary-color);
      transform: translateX(5px);
    }

    .footer-bottom-ultra {
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding-top: var(--spacing-xl);
      text-align: center;
      color: rgba(255, 255, 255, 0.7);
      position: relative;
      z-index: 1;
    }

    /* Ultra Modern Buttons */
    .btn-ultra-modern {
      border-radius: var(--radius-xl);
      font-weight: 600;
      padding: var(--spacing-md) var(--spacing-2xl);
      transition: var(--transition-normal);
      border: none;
      position: relative;
      overflow: hidden;
      font-size: var(--font-size-base);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .btn-ultra-modern::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.6s;
    }

    .btn-ultra-modern:hover::before {
      left: 100%;
    }

    .btn-ultra-modern:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-xl);
    }

    .btn-primary-ultra {
      background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
      color: white;
      box-shadow: var(--shadow-md);
    }

    .btn-primary-ultra:hover {
      background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
      color: white;
    }

    .btn-outline-ultra {
      background: transparent;
      color: var(--primary-color);
      border: 2px solid var(--primary-color);
    }

    .btn-outline-ultra:hover {
      background: var(--primary-color);
      color: white;
      border-color: var(--primary-color);
    }

    /* Ultra Modern Cards */
    .card-ultra-modern {
      background: white;
      border-radius: var(--radius-2xl);
      box-shadow: var(--shadow-lg);
      border: none;
      overflow: hidden;
      transition: var(--transition-normal);
      position: relative;
    }

    .card-ultra-modern::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
      opacity: 0;
      transition: var(--transition-normal);
    }

    .card-ultra-modern:hover::before {
      opacity: 1;
    }

    .card-ultra-modern:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-xl);
    }

    /* Scroll to Top Ultra */
    .scroll-to-top-ultra {
      position: fixed;
      bottom: var(--spacing-2xl);
      right: var(--spacing-2xl);
      width: 60px;
      height: 60px;
      background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
      color: white;
      border: none;
      border-radius: var(--radius-full);
      cursor: pointer;
      opacity: 0;
      visibility: hidden;
      transition: var(--transition-normal);
      z-index: var(--z-toast);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: var(--shadow-xl);
      font-size: var(--font-size-lg);
    }

    .scroll-to-top-ultra.show {
      opacity: 1;
      visibility: visible;
    }

    .scroll-to-top-ultra:hover {
      transform: scale(1.1) rotate(360deg);
      box-shadow: var(--shadow-glow);
    }

    /* Loading Animation */
    .loading-ultra {
      opacity: 0;
      animation: fadeInUltra 0.8s ease-out forwards;
    }

    @keyframes fadeInUltra {
      to {
        opacity: 1;
      }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .navbar-brand-ultra {
        font-size: var(--font-size-xl);
      }

      .logo-ultra-modern {
        height: 45px;
      }

      .navbar-nav-ultra .nav-link-ultra {
        padding: var(--spacing-xs) var(--spacing-md);
      }

      .navbar-search-center {
        display: none; /* Hide search bar on mobile */
      }

      .footer-content-ultra {
        grid-template-columns: 1fr;
        text-align: center;
      }

      .offcanvas-ultra-modern {
        width: 280px;
      }

      main {
        padding-top: 100px;
      }
    }

    @media (max-width: 992px) {
      .navbar-search-center {
        max-width: 300px;
        margin: 0 var(--spacing-sm);
      }
    }

    /* Advanced Animations */
    @keyframes slideInLeft {
      from {
        transform: translateX(-100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes slideInRight {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes slideInUp {
      from {
        transform: translateY(100%);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .animate-slide-left {
      animation: slideInLeft 0.8s ease-out forwards;
    }

    .animate-slide-right {
      animation: slideInRight 0.8s ease-out forwards;
    }

    .animate-slide-up {
      animation: slideInUp 0.8s ease-out forwards;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: var(--light-gray);
    }

    ::-webkit-scrollbar-thumb {
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      border-radius: var(--radius-full);
    }

    ::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(135deg, var(--primary-dark), var(--accent-dark));
    }
  </style>
</head>
<body>

<?php
$session = session();
$cart = $session->get('cart') ?? [];
$cartCount = array_sum(array_column($cart, 'qty'));
$isLoggedIn = $session->get('isLoggedIn');
$username = $session->get('username');
$role = $session->get('role');
?>

<!-- Ultra Modern Navbar -->
<nav class="navbar navbar-expand-lg navbar-ultra-modern" id="navbarUltra">
  <div class="container">
    <a class="navbar-brand navbar-brand-ultra d-flex align-items-center" href="<?= base_url('/') ?>">
      <img src="<?= base_url('images/logo.png') ?>" alt="Logo Yokuwi" class="logo-ultra-modern">
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUltra">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavUltra">
      <!-- Search Bar in Center (only on menu page) -->
      <?php if ($this->getData()['showSearch'] ?? false): ?>
        <div class="navbar-search-center mx-auto">
          <form class="d-flex" action="/menu" method="get">
            <div class="input-group search-input-group">
              <input class="form-control search-input-ultra" type="search" name="search"
                     placeholder="Cari menu..." aria-label="Search"
                     value="<?= esc($this->getData()['searchQuery'] ?? '') ?>">
              <button class="btn btn-search-ultra" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
        </div>
      <?php endif; ?>

      <ul class="navbar-nav navbar-nav-ultra ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link nav-link-ultra" href="<?= base_url('/') ?>">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-ultra" href="<?= site_url('menu') ?>">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-ultra cart-container-ultra" href="/cart">
            <i class="bi bi-cart3 cart-icon-ultra"></i>
            <?php if ($cartCount > 0): ?>
              <span class="cart-count-ultra"><?= $cartCount ?></span>
            <?php endif; ?>
          </a>
        </li>

        <?php if ($isLoggedIn): ?>
          <li class="nav-item user-menu-ultra dropdown">
            <a class="dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
              <div class="user-avatar-ultra">
                <?= strtoupper(substr($username, 0, 1)) ?>
              </div>
              <span class="d-none d-md-inline fw-semibold"><?= esc($username) ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-ultra dropdown-menu-end">
              <?php if ($role === 'admin' || $role === 'pemilik'): ?>
                <li><a class="dropdown-item dropdown-item-ultra" href="<?= site_url('admin/kelola-menu') ?>">
                  <i class="bi bi-gear me-2"></i>Kelola Menu
                </a></li>
                <?php if ($role === 'pemilik'): ?>
                  <li><a class="dropdown-item dropdown-item-ultra" href="<?= site_url('daftar_login') ?>">
                    <i class="bi bi-person-check me-2"></i>Informasi Akun
                  </a></li>
                <?php endif; ?>
                <li><hr class="dropdown-divider dropdown-divider-ultra"></li>
              <?php endif; ?>
              <li><a class="dropdown-item dropdown-item-ultra text-danger" href="<?= site_url('logout') ?>">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
              </a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="btn btn-primary-ultra btn-ultra-modern ms-3" href="<?= site_url('login') ?>">
              <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Ultra Modern Offcanvas Menu -->
<div class="offcanvas offcanvas-end offcanvas-ultra-modern" tabindex="-1" id="offcanvasUltra">
  <div class="offcanvas-header offcanvas-header-ultra">
    <h5 class="offcanvas-title offcanvas-title-ultra">
      <i class="bi bi-person-circle me-2"></i>
      <?= esc($username ?? 'Menu') ?>
    </h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body offcanvas-body-ultra">
    <a class="nav-link nav-link-ultra-modern" href="<?= base_url('/') ?>">
      <i class="bi bi-house-door"></i>Beranda
    </a>
    <a class="nav-link nav-link-ultra-modern" href="<?= site_url('menu') ?>">
      <i class="bi bi-list-ul"></i>Menu
    </a>
    <a class="nav-link nav-link-ultra-modern" href="/cart">
      <i class="bi bi-cart3"></i>Keranjang
      <?php if ($cartCount > 0): ?>
        <span class="badge badge-ultra-modern"><?= $cartCount ?></span>
      <?php endif; ?>
    </a>

    <?php if ($isLoggedIn): ?>
      <?php if ($role === 'admin' || $role === 'pemilik'): ?>
        <a class="nav-link nav-link-ultra-modern" href="<?= site_url('admin/kelola-menu') ?>">
          <i class="bi bi-gear"></i>Kelola Menu
        </a>
        <?php if ($role === 'pemilik'): ?>
          <a class="nav-link nav-link-ultra-modern" href="<?= site_url('daftar_login') ?>">
            <i class="bi bi-person-check"></i>Informasi Akun
          </a>
        <?php endif; ?>
      <?php endif; ?>
      <a class="nav-link nav-link-ultra-modern text-danger" href="<?= site_url('logout') ?>">
        <i class="bi bi-box-arrow-right"></i>Logout
      </a>
    <?php else: ?>
      <a class="nav-link nav-link-ultra-modern text-primary fw-bold" href="<?= site_url('login') ?>">
        <i class="bi bi-box-arrow-in-right"></i>Masuk
      </a>
    <?php endif; ?>
  </div>
</div>

<main class="loading-ultra">
  <?= $this->renderSection('content') ?>
</main>

<!-- Ultra Modern Footer -->
<footer class="footer-ultra-modern">
  <div class="container">
    <div class="footer-content-ultra">
      <div class="footer-section-ultra">
        <h5>Yokuwi</h5>
        <p>Warung makan modern yang menyajikan berbagai menu makanan Indonesia dengan cita rasa autentik dan pelayanan yang ramah. Kami berkomitmen memberikan pengalaman kuliner terbaik untuk Anda.</p>
      </div>

      <div class="footer-section-ultra">
        <h5>Menu Cepat</h5>
        <ul class="footer-links-ultra">
          <li><a href="<?= base_url('/') ?>">Beranda</a></li>
          <li><a href="<?= site_url('menu') ?>">Menu Makanan</a></li>
          <li><a href="/cart">Keranjang Belanja</a></li>
          <?php if (!$isLoggedIn): ?>
            <li><a href="<?= site_url('login') ?>">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>

      <div class="footer-section-ultra">
        <h5>Kontak Kami</h5>
        <p><i class="bi bi-geo-alt me-2"></i>Jl. Raya No. 123, Jakarta</p>
        <p><i class="bi bi-telephone me-2"></i>+62 812-3456-7890</p>
        <p><i class="bi bi-envelope me-2"></i>info@yokuwi.com</p>
        <p><i class="bi bi-clock me-2"></i>Buka 24 Jam</p>
      </div>

      <div class="footer-section-ultra">
        <h5>Ikuti Kami</h5>
        <div class="social-links d-flex gap-3">
          <a href="#" class="social-link" style="color: #1877f2;"><i class="bi bi-facebook fs-4"></i></a>
          <a href="#" class="social-link" style="color: #e4405f;"><i class="bi bi-instagram fs-4"></i></a>
          <a href="#" class="social-link" style="color: #1da1f2;"><i class="bi bi-twitter fs-4"></i></a>
          <a href="#" class="social-link" style="color: #ff0000;"><i class="bi bi-youtube fs-4"></i></a>
        </div>
      </div>
    </div>

    <div class="footer-bottom-ultra">
      <p class="mb-0">&copy; <?= date('Y') ?> Warung Makan Yokuwi.</p>
    </div>
  </div>
</footer>

<!-- Scroll to Top Ultra -->
<button class="scroll-to-top-ultra" id="scrollToTopUltra">
  <i class="bi bi-chevron-up"></i>
</button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Ultra Modern JavaScript
document.addEventListener('DOMContentLoaded', function() {
  // Navbar Scroll Effect
  const navbar = document.getElementById('navbarUltra');
  let lastScrollTop = 0;

  window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > 100) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }

    lastScrollTop = scrollTop;
  });

  // Scroll to Top Ultra
  const scrollToTopBtn = document.getElementById('scrollToTopUltra');

  window.addEventListener('scroll', function() {
    if (window.pageYOffset > 300) {
      scrollToTopBtn.classList.add('show');
    } else {
      scrollToTopBtn.classList.remove('show');
    }
  });

  scrollToTopBtn.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  // Smooth Scrolling for Anchor Links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        const offsetTop = target.offsetTop - 100;
        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      }
    });
  });

  // Enhanced Dropdown Animation
  const dropdowns = document.querySelectorAll('.dropdown');
  dropdowns.forEach(dropdown => {
    dropdown.addEventListener('show.bs.dropdown', function() {
      const menu = this.querySelector('.dropdown-menu');
      menu.style.opacity = '0';
      menu.style.transform = 'translateY(-10px)';
      setTimeout(() => {
        menu.style.transition = 'all 0.3s ease';
        menu.style.opacity = '1';
        menu.style.transform = 'translateY(0)';
      }, 1);
    });

    dropdown.addEventListener('hide.bs.dropdown', function() {
      const menu = this.querySelector('.dropdown-menu');
      menu.style.opacity = '0';
      menu.style.transform = 'translateY(-10px)';
    });
  });

  // Cart Icon Animation
  const cartIcon = document.querySelector('.cart-icon-ultra');
  if (cartIcon) {
    cartIcon.addEventListener('click', function() {
      this.style.animation = 'none';
      setTimeout(() => {
        this.style.animation = 'bounce 0.6s ease';
      }, 10);
    });
  }

  // Loading Animation
  setTimeout(() => {
    document.body.classList.add('loaded');
  }, 100);

  // Intersection Observer for Animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-slide-up');
      }
    });
  }, observerOptions);

  // Observe elements for animation
  document.querySelectorAll('.card-ultra-modern, .footer-section-ultra').forEach(el => {
    observer.observe(el);
  });

  // Parallax Effect for Hero Background
  window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const rate = scrolled * -0.5;
    // Add parallax to background elements if needed
  });

  // Enhanced Form Validation
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      const submitBtn = form.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memproses...';
        submitBtn.disabled = true;
      }
    });
  });

  // Dynamic Theme Switching (for future enhancement)
  const themeToggle = document.getElementById('themeToggle');
  if (themeToggle) {
    themeToggle.addEventListener('click', function() {
      document.body.classList.toggle('dark-theme');
      localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
    });
  }

  // Load saved theme
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'dark') {
    document.body.classList.add('dark-theme');
  }
});
</script>

</body>
</html>
