<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<section class="py-5">
  <div class="container">
    <h1 class="fw-bold text-center text-danger mb-5">🛒 Keranjang Belanja</h1>

    <?php if (!empty($cart)): ?>
      <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
          <thead class="table-danger">
            <tr>
              <th>Gambar</th>
              <th>Nama Menu</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $total = 0; ?>
            <?php foreach ($cart as $item): ?>
              <?php $subtotal = $item['harga'] * $item['qty']; ?>
              <?php $total += $subtotal; ?>
              <tr>
                <td>
                  <img src="<?= base_url('images/' . esc($item['gambar'])) ?>" width="80" height="80" style="object-fit: cover;" class="rounded-3">
                </td>
                <td><?= esc($item['nama']) ?></td>
                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                <td>
                  <form action="<?= site_url('cart/updateQty/' . $item['id']) ?>" method="post" class="d-inline-flex align-items-center justify-content-center">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <button type="submit" name="action" value="minus" class="btn btn-sm btn-outline-danger px-2 me-2">−</button>
                    <input type="text" name="qty" value="<?= $item['qty'] ?>" class="form-control text-center" style="width: 60px;" readonly>
                    <button type="submit" name="action" value="plus" class="btn btn-sm btn-outline-success px-2 ms-2">+</button>
                  </form>
                </td>
                <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                <td>
                  <a href="/cart/remove/<?= $item['id'] ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4" class="text-end">Total:</th>
              <th colspan="2" class="text-danger fs-5 fw-bold">Rp <?= number_format($total, 0, ',', '.') ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="text-center mt-4">
        <a href="/menu" class="btn btn-outline-danger rounded-pill me-2">Lanjut Belanja</a>
        <a href="#" class="btn btn-danger rounded-pill">Checkout</a>
      </div>
    <?php else: ?>
      <p class="text-center text-muted">Keranjang masih kosong.</p>
      <div class="text-center mt-3">
        <a href="/menu" class="btn btn-danger rounded-pill">Lihat Menu</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
