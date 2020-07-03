<div class="container-fluid">
    <h4>Invoice Pemesanan</h4>

    <?php if (empty($invoice)) : ?>
        <div class="alert alert-danger" role="alert">
            Data Tidak Ditemukan / Tidak Ada
        </div>
    <?php endif ?>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>No</th>
            <th>Id Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($invoice as $inv) : ?>
            <tr>
                <td><?= ++$start ?></td>
                <td><?= $inv->id ?></td>
                <td><?= $inv->nama ?></td>
                <td><?= $inv->alamat ?></td>
                <td><?= $inv->tgl_pesan ?></td>
                <td><?= $inv->batas_bayar ?></td>
                <td>
                    <?= anchor('admin/Invoice/detail/' . $inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

    <?= $this->pagination->create_links() ?>
</div>