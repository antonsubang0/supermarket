<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<a href="<?= base_url(); ?>">Kembali</a>
<div>
    <p><?= session()->getFlashdata("status") ?? null ?></p>
    <table>
        <thead>
            <tr>
                <th class="center-align">No.</th>
                <th class="center-align">Nama Barang</th>
                <th class="center-align">Harga</th>
                <th class="center-align">Qty</th>
                <th class="center-align">Subtotal</th>
                <th class="center-align">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($keranjang as $item) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $item->nama_barang; ?></td>
                    <td><?= $item->harga_barang; ?></td>
                    <td><?= $item->qty_barang; ?></td>
                    <td><?= $item->harga_barang * $item->qty_barang; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>/plus/<?= $item->id_keranjang ?>">Plus</a>
                        <a href="<?= base_url(); ?>/minus/<?= $item->id_keranjang ?>">Minus</a>
                        <a href="<?= base_url(); ?>/discard/<?= $item->id_keranjang ?>">Discard</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action="" method="post">
        <input type="hidden" name="_method" value="DELETE" />
        <button>Checkout</button>
    </form>
</div>
<?= $this->endSection() ?>