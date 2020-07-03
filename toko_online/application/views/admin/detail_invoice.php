<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success">Nomor Invoice: <?= $invoice->id ?></div>
    </h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id Barang</th>
            <th>Nama Produk</th>
            <th>Jumlah pesanan</th>
            <th>Harga Satuan</th>
            <th>Sub Total</th>
        </tr>

        <?php
        $total = 0;
        foreach ($pesanan as $psn) :
            $subtotal = $psn->jumlah * $psn->harga;
            $total += $subtotal;
        ?>
            <tr>
                <td><?= $psn->id_brg ?></td>
                <td><?= $psn->nama_brg ?></td>
                <td><?= $psn->jumlah ?></td>
                <td><?= number_format($psn->harga, 0, ',', '.') ?></td>
                <td><?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
        <?php endforeach ?>

        <tr>
            <td colspan="4" align="right">Total</td>
            <td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
        </tr>
    </table>

    <a href="<?= base_url('admin/invoice') ?>">
        <div class="btn btn-sm btn-primary">Kembali</div>
    </a>
</div>