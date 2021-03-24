<?php

namespace App\Http\Controllers;

use App\Services\DataService;

use Illuminate\Http\Request;


class DataController extends Controller
{
    public function index()
    {
        $oke = new DataService();
        $data = $oke->getData();
        $jumlah = $oke->getDataWithCondition();

        return view('tampil_data', ['data' => $data, 'jumlah' => $jumlah]);
    }
}
