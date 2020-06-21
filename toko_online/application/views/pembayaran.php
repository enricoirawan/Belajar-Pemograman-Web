<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4> Total belanja anda : Rp. " . number_format($grand_total, 0, ',', '.');

                ?>
            </div>
            <br>
            <h3>Input Alamat Pengiriman dan Pembayaran</h3>
            <form action="<?= base_url('Dashboard/proses_pesanan') ?>" class="mb-3" method="POST">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" placeholder="No Telepon Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jasa Pengiriman</label>
                    <select name="" id="" class="form-control">
                        <option value="JNE">JNE</option>
                        <option value="TIKI">TIKI</option>
                        <option value="POS">POS INDOENESIA</option>
                        <option value="GOJEK">GOJEK</option>
                        <option value="GRAB">GRAB</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Bank</label>
                    <select name="" id="" class="form-control">
                        <option value="BCA">BCA - XXXXXX</option>
                        <option value="BNI">BNI - XXXXXXX</option>
                        <option value="BRI">BRI - XXXXX</option>
                        <option value="MANDIRI">MANDIRI - XXXXX</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-success">Pesan</button>
            </form>
        <?php } else {
                    echo "<h4> Keranjang Belanja Anda Masih Kosong";
                } ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>