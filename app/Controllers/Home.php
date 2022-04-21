<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\StokBarangModel;
use CodeIgniter\Files\File;

class Home extends BaseController
{
    public function index()
    {
        $stockModel = new StokBarangModel();
        $data['barang'] = $stockModel->findAll();
        echo view('vi_barang', $data);
    }
    public function tambah()
    {
        echo view('vi_tambah');
    }
    public function store()
    {
        $rules = [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'image' => 'uploaded[image]|ext_in[image,png,jpg]',
        ];
        $rulemsg = [
            'nama' => ['required' => 'Nama barang harus diisi'],
            'harga' => ['required' => 'Harga barang harus diisi', 'numeric' => 'Harga barang harus angka'],
            'stok' => ['required' => 'Stok barang harus diisi', 'numeric' => 'Stok barang harus angka'],
            'image' => ['uploaded' => 'Harus uploade image', 'ext_in' => 'Type file harus JPG/PNG'],
        ];

        if (!$this->validate($rules, $rulemsg)) {
            return redirect()->to('/tambah')->with('status', $this->validator->getErrors())->withInput();
        }
        $barangModel = new StokBarangModel();
        $terakhir = $barangModel->orderBy('id_barang', 'DESC')->findAll(1);
        $nomor = (int) substr($terakhir[0]->kode_barang, 2, 3);

        $nama = ucwords($this->request->getVar('nama'));
        $jumlahkata = explode(' ', $nama);
        $regex = '/[A-Z]+/';
        $hasil = [];
        preg_match_all($regex, $nama, $hasil);

        if (count($jumlahkata) > 1) {
            $char = $hasil[0][0] . $hasil[0][1];
        } else {
            $nama = strtoupper($nama);
            $huruf = str_split($nama);
            $char = $huruf[0] . $huruf[1];
        }
        $kodeBarang = $char . sprintf("%03s", $nomor);

        $file = $this->request->getFile('image');
        $newName = $file->getRandomName();
        $file->move('uploads/', $newName);
        $data = [
            'kode_barang' => $kodeBarang,
            'nama_barang' => $this->request->getVar('nama'),
            'harga_barang' => $this->request->getVar('harga'),
            'jmlh_stok_barang' => $this->request->getVar('stok'),
            'img_barang' => $newName,
        ];
        $barangModel->insert($data);
        session()->setFlashdata("status", "Berhasil dikirim");
        return redirect()->to('/');
        // dd($this->request->getVar());
    }
    public function beli($id)
    {
        $barangModel = new StokBarangModel();
        $keranjangModel = new KeranjangModel();
        $item = $barangModel->find($id);
        $item1 = $keranjangModel->where('kode_barang', $item->kode_barang)->first();
        if ($item->jmlh_stok_barang == 0) return redirect()->to('/');
        if ($item1 == null) {
            $data = [
                'kode_barang' => $item->kode_barang,
                'qty_barang' => 1
            ];
            $keranjangModel->insert($data);
            $barangModel->set(['jmlh_stok_barang' => $item->jmlh_stok_barang - 1])->where('kode_barang', $item->kode_barang)->update();
        } else {
            $keranjangModel->set(['qty_barang' => $item1->qty_barang + 1])->where('kode_barang', $item->kode_barang)->update();
            $barangModel->set(['jmlh_stok_barang' => $item->jmlh_stok_barang - 1])->where('kode_barang', $item->kode_barang)->update();
        }
        return redirect()->to('/');
    }
}
