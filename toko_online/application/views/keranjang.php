<div class="container-fluid">
    <h4>Keranjang Belanja</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Nomor</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>
        <?php
        $nomor = 0;
        foreach ($this->cart->contents() as $items) :
        ?>
            <tr>
                <td><?= ++$nomor ?></td>
                <td><?= $items['name'] ?></td>
                <td align="center"><?= $items['qty'] ?></td>
                <td align="center">Rp.<?= number_format($items['price'], 0, ',', '.')  ?></td>
                <td align="center">Rp.<?= number_format($items['subtotal'], 0, ',', '.')  ?></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="4" align="right">Total : </td>
            <td align="center">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>
    </table>

    <div align="right">
        <a href="<?= base_url('Dashboard/hapus_keranjang') ?>">
            <div class="btn btn-sm btn-danger">Hapus Keranjang</div>
        </a>
        <a href="<?= base_url('Dashboard/index') ?>">
            <div class="btn btn-sm btn-primary">Lanjutkan Belanja</div>
        </a>
        <a href="<?= base_url('Dashboard/pembayaran') ?>">
            <div class="btn btn-sm btn-success">Pembayaran</div>
        </a>
    </div>
</div>