<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-sm fa-plus"></i> Tambah Data</button>

    <h5>Total : <?= $total_rows ?> </h5>
    <?php if (empty($barang)) : ?>
        <div class="alert alert-danger" role="alert">
            Data Tidak Ditemukan / Tidak Ada
        </div>
    <?php endif ?>
    <table class="table table-bordered mt-3">
        <tr>
            <th>NO</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="3">Aksi</th>
        </tr>

        <?php
        foreach ($barang as $brg) : ?>
            <tr>
                <td><?= ++$start ?></td>
                <td><?= $brg->nama_brg ?></td>
                <td><?= $brg->keterangan ?></td>
                <td><?= $brg->kategori ?></td>
                <td><?= $brg->harga ?></td>
                <td><?= $brg->stok ?></td>
                <td>
                    <?= anchor('admin/data_barang/detail_barang/' . $brg->id_brg, '  <div class="btn btn-sm btn-success">
                        <i class="fas fa-search-plus"></i>
                    </div>') ?>
                </td>
                <td>
                    <?= anchor('admin/data_barang/edit/' . $brg->id_brg, ' <div class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </div>') ?>
                </td>
                <td>
                    <?= anchor('admin/data_barang/hapus/' . $brg->id_brg, ' <div class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </div>') ?>
                </td>
            </tr>
        <?php endforeach ?>

    </table>

    <?= $this->pagination->create_links(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="<?= base_url('admin/data_barang/tambah_aksi') ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_brg" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="elektronik">Elektronik</option>
                            <option value="Pakaian pria">Pakaian Pria</option>
                            <option value="Pakaian wanita">Pakaian Wanita</option>
                            <option value="Pakaian anak">Pakian Anak-anak</option>
                            <option value="Peralatan olahraga">Peralatan Olahraga</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gambar Produk</label><br>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>