<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\StokBarangModel;

class StokBarangController extends BaseController
{
    public function index()
    {
        $stockModel = new StokBarangModel();
        dd();
    }
}
