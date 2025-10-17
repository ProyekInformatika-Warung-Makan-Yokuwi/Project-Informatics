<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5">
  <div class="container">
    <h1 class="fw-bold text-center text-danger mb-5">🛒 Keranjang Belanja</h1>

    <?php if (!empty($cart)): ?>
      <form action="<?= site_url('cart/checkout') ?>" method="post" id="cartForm">
        <div class="table-responsive">
          <table class="table table-bordered align-middle text-center">
            <thead class="table-danger">
              <tr>
                <th>Pilih</th>
                <th>Gambar</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th style="width: 180px;">Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($cart as $item): ?>
                <tr data-id="<?= $item['id'] ?>">
                  <td>
                    <input type="checkbox" name="selected[]" value="<?= $item['id'] ?>" class="form-check-input">
                  </td>
                  <td>
                    <img src="<?= base_url('images/' . esc($item['gambar'])) ?>" width="80" height="80" style="object-fit: cover;" class="rounded-3">
                  </td>
                  <td class="fw-semibold"><?= esc($item['nama']) ?></td>
                  <td>Rp <span class="harga"><?= number_format($item['harga'], 0, ',', '.') ?></span></td>
                  <td>
                    <div class="d-flex justify-content-center align-items-center">
                      <button type="button" class="btn btn-sm btn-outline-danger px-2 minus-btn">−</button>
                      <input type="text" class="form-control text-center mx-2 qty-input" value="<?= $item['qty'] ?>" style="width: 60px;" readonly>
                      <button type="button" class="btn btn-sm btn-outline-success px-2 plus-btn">+</button>
                    </div>
                  </td>
                  <td>Rp <span class="subtotal"><?= number_format($item['harga'] * $item['qty'], 0, ',', '.') ?></span></td>
                  <td>
                    <a href="/cart/remove/<?= $item['id'] ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="text-center mt-4">
          <a href="/menu" class="btn btn-outline-danger rounded-pill me-2">Lanjut Belanja</a>
          <button type="submit" class="btn btn-danger rounded-pill">Checkout yang Dipilih</button>
        </div>
      </form>
    <?php else: ?>
      <p class="text-center text-muted">Keranjang masih kosong.</p>
      <div class="text-center mt-3">
        <a href="/menu" class="btn btn-danger rounded-pill">Lihat Menu</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<script>
// Fungsi untuk format angka ke format rupiah
function formatRupiah(angka) {
  return new Intl.NumberFormat('id-ID', { style: 'decimal', maximumFractionDigits: 0 }).format(angka);
}

// Event listener untuk tombol + dan −
document.querySelectorAll('.plus-btn, .minus-btn').forEach(button => {
  button.addEventListener('click', function() {
    const row = this.closest('tr');
    const qtyInput = row.querySelector('.qty-input');
    const harga = parseInt(row.querySelector('.harga').textContent.replace(/\./g, ''));
    let qty = parseInt(qtyInput.value);

    if (this.classList.contains('plus-btn')) {
      qty++;
    } else if (this.classList.contains('minus-btn') && qty > 1) {
      qty--;
    }

    qtyInput.value = qty;
    const subtotal = harga * qty;
    row.querySelector('.subtotal').textContent = formatRupiah(subtotal);

    // Kirim update ke server tanpa reload
    fetch(`/cart/updateQtyAjax/${row.dataset.id}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify({ qty })
    }).catch(err => console.error(err));
  });
});
</script>

<?= $this->endSection() ?>
