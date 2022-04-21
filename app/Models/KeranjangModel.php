<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table      = 'keranjang';
    protected $primaryKey = 'id_keranjang';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kode_barang', 'qty_barang'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];

    public function keranjangBarang()
    {
        return $this->join('stok_barang', 'keranjang.kode_barang = stok_barang.kode_barang');
    }
}
