<?php

namespace App\Services;

use Kreait\Firebase\Factory;

require '../vendor/autoload.php';

class DataService
{
    private $db;
    private $firebase;

    public function __construct()
    {
        $this->firebase = (new Factory)->withServiceAccount('../key/laravel-a6c56-firebase-adminsdk-e5by1-07fd06a350.json');
        $this->db = $this->firebase->createDatabase();
    }
    public function getData()
    {

        $ref = $this->db->getReference('/data');
        $hasil = $ref->getValue();
        return $hasil;
    }
    public function getDataWithCondition()
    {
        $ref = $this->db->getReference('/data');
        $hasil = $ref->orderByChild('suhu')->startAt(36.7)->getSnapshot()->numChildren();
        return $hasil;
    }
}
