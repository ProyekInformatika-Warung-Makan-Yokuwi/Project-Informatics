<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5" style="background: linear-gradient(180deg, #fff6f6 0%, #ffffff 100%); min-height: 100vh;">
  <div class="container">
    <!-- Progress Steps -->
    <div class="text-center mb-5">
      <div class="d-flex justify-content-center align-items-center gap-3">
        <div class="step active">1</div>
        <div class="line"></div>
        <div class="step active">2</div>
        <div class="line"></div>
        <div class="step active">3</div>
        <div class="line"></div>
        <div class="step">4</div>
      </div>
      <div class="mt-3 text-muted small fw-semibold">
        Keranjang &nbsp;→&nbsp; Checkout &nbsp;→&nbsp; <span class="text-danger">Pembayaran</span> &nbsp;→&nbsp; Selesai
      </div>
    </div>

    <div class="row justify-content-center">
      <!-- Kolom Pembayaran -->
      <div class="col-lg-7 mb-4">
        <div class="card border-0 shadow-lg rounded-4">
          <div class="card-body p-5">
            <div class="text-center mb-5">
              <h3 class="fw-bold text-danger mb-2">💳 Pembayaran Pesanan</h3>
              <p class="text-muted">Pilih metode pembayaran yang Anda inginkan.</p>
            </div>

            <div class="text-center mb-4">
              <h4 class="fw-semibold text-secondary mb-2">Total Pembayaran</h4>
              <h1 class="fw-bold text-danger display-6 mb-3">Rp <?= number_format($total ?? 0, 0, ',', '.') ?></h1>
              <small class="text-muted">Termasuk pajak & biaya layanan</small>
            </div>

            <form id="paymentForm" method="post" action="/order/confirmPayment">
              <h5 class="fw-bold mb-3">Metode Pembayaran</h5>

              <div class="row g-4 mb-4">
                <!-- Tunai -->
                <div class="col-md-6">
                  <label class="payment-card p-4 rounded-4 shadow-sm w-100 h-100">
                    <input class="form-check-input" type="radio" name="metode" id="tunai" value="tunai" checked hidden>
                    <div class="text-center">
                      <div class="icon-circle bg-danger-subtle mb-3">
                        💵
                      </div>
                      <h6 class="fw-bold mb-1 text-dark">Tunai</h6>
                      <p class="text-muted small mb-0">Bayar langsung di kasir</p>
                    </div>
                  </label>
                </div>

                <!-- QRIS -->
                <div class="col-md-6">
                  <label class="payment-card p-4 rounded-4 shadow-sm w-100 h-100">
                    <input class="form-check-input" type="radio" name="metode" id="qris" value="qris" hidden>
                    <div class="text-center">
                      <div class="icon-circle bg-danger-subtle mb-3">
                        📱
                      </div>
                      <h6 class="fw-bold mb-1 text-dark">QRIS</h6>
                      <p class="text-muted small mb-0">Transfer otomatis</p>
                    </div>
                  </label>
                </div>
              </div>

              <!-- QRIS Section -->
              <div id="qrisSection" class="text-center d-none fade-in mb-4">
                <p class="text-muted mb-3">Scan kode QR di bawah menggunakan e-wallet atau mobile banking Anda:</p>
                <img src="<?= base_url('images/qris_example.png') ?>" alt="QRIS" class="img-fluid rounded-3 shadow mb-3" width="230">
                <p class="fw-semibold text-success mb-4">⚡ Pembayaran akan otomatis terverifikasi setelah berhasil.</p>
              </div>

              <div class="text-center mt-4">
                <button type="submit" class="btn btn-danger rounded-pill px-5 py-2 fw-semibold shadow-sm me-2">
                  Saya Sudah Bayar
                </button>
                <a href="/cart" class="btn btn-outline-danger rounded-pill px-4 py-2 fw-semibold">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Kolom Ringkasan Pesanan -->
      <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4">
          <div class="card-body p-4">
            <h5 class="fw-bold text-secondary mb-3">🧾 Ringkasan Pesanan</h5>
            <ul class="list-group list-group-flush mb-3">
              <li class="list-group-item d-flex justify-content-between">
                <span>Subtotal</span>
                <strong>Rp <?= number_format($total ?? 0, 0, ',', '.') ?></strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Pajak & Biaya</span>
                <strong>Rp <?= number_format(($total ?? 0) * 0.1, 0, ',', '.') ?></strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Total Akhir</span>
                <strong class="text-danger">Rp <?= number_format(($total ?? 0) * 1.1, 0, ',', '.') ?></strong>
              </li>
            </ul>
            <p class="text-muted small text-center mb-0">
              Harga dapat berubah sesuai metode pembayaran yang dipilih.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const qrisRadio = document.getElementById("qris");
  const tunaiRadio = document.getElementById("tunai");
  const qrisSection = document.getElementById("qrisSection");
  const cards = document.querySelectorAll(".payment-card");

  cards.forEach(card => {
    card.addEventListener("click", () => {
      cards.forEach(c => c.classList.remove("active"));
      card.classList.add("active");
      card.querySelector("input").checked = true;
      qrisSection.classList.toggle("d-none", !qrisRadio.checked);
    });
  });
});
</script>

<style>
  /* Progress bar */
  .step {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #f0f0f0;
    color: #999;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .step.active {
    background: #dc3545;
    color: #fff;
    box-shadow: 0 0 8px rgba(220, 53, 69, 0.5);
  }
  .line {
    width: 50px;
    height: 3px;
    background: #f0f0f0;
  }
  .step.active + .line {
    background: #dc3545;
  }

  /* Payment cards */
  .payment-card {
    border: 2px solid transparent;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  .payment-card:hover {
    transform: translateY(-3px);
    border-color: #ffc1c1;
    background-color: #fff9f9;
  }
  .payment-card.active {
    border-color: #dc3545;
    background-color: #fff2f2;
  }

  .icon-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    font-size: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .bg-danger-subtle {
    background-color: #ffe5e5 !important;
  }

  .fade-in {
    animation: fadeIn 0.4s ease-in-out;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .btn-danger:hover {
    background-color: #c82333;
    transform: scale(1.04);
  }
</style>

<?= $this->endSection() ?>
