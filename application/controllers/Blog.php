<?php

class Blog extends CI_Controller {
    public function index($nama, $goldarah, $alamat)
    {
        echo "Selamat Datang $nama <br />";
        echo "Golongan Darah Anda $goldarah <br />";
        echo "Anda Tinggal di $alamat <br />";
    }
}