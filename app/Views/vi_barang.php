<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<a href="/tambah">Tambah Produk</a>
<div>
    <p><?= session()->getFlashdata("status") ?? null ?></p>
    <table>
        <thead>
            <tr>
                <th class="center-align">No.</th>
                <th class="center-align">Nama Barang</th>
                <th class="center-align">Harga</th>
                <th class="center-align">Stok</th>
                <th class="center-align">Gambar</th>
                <th class="center-align">Kode</th>
                <th class="center-align">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($barang as $item) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $item->nama_barang; ?></td>
                    <td><?= $item->harga_barang; ?></td>
                    <td><?= $item->jmlh_stok_barang; ?></td>
                    <td><img class="gambar" src="<?= base_url(); ?>/uploads/<?= $item->img_barang; ?>"></td>
                    <td><?= $item->kode_barang; ?></td>
                    <td><a href="<?= base_url(); ?>/beli/<?= $item->id_barang ?>">Beli</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>