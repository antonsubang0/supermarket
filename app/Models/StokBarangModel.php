<?php

namespace App\Models;

use CodeIgniter\Model;

class StokBarangModel extends Model
{
    protected $table      = 'stok_barang';
    protected $primaryKey = 'id_barang';

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['kode_barang', 'nama_barang', 'harga_barang', 'jmlh_stok_barang', 'img_barang'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
