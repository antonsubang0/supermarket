<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<form method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div>
        <input id="nama" name="nama" value="<?= old('nama'); ?>" type="text" class="validate" placeholder="Nama Barang">
        <small><?= session()->getFlashdata("status") ?  session()->getFlashdata("status")['nama'] : null ?></small>
    </div>
    <div>
        <input id="harga" name="harga" value="<?= old('harga'); ?>" type="number" class="validate" placeholder="Harga Barang">
        <small><?= session()->getFlashdata("status") ?  session()->getFlashdata("status")['harga'] : null ?></small>
    </div>
    <div>
        <input id="stok" name="stok" value="<?= old('stok'); ?>" type="number" class="validate" placeholder="Stok Barang">
        <small><?= session()->getFlashdata("status") ?  session()->getFlashdata("status")['stok'] : null ?></small>
    </div>
    <div>
        <input type="file" name="image" id="picker">
        <small><?= session()->getFlashdata("status") ?  session()->getFlashdata("status")['image'] : null ?></small>
    </div>
    <button type="submit">Kirim</button>
</form>
<?= $this->endSection() ?>