<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public $table = 'barang,barang_masuk';
    public $id = 'id_barang';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    function total_rows($q = NULL) {
            $this->db->select('*');
            $this->db->from('barang,barang_masuk ma,barang_keluar ke');
             $this->db->where('ma.kode_barang=ke.kode_barang');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_laporan() {
        $this->db->select('barang.kode_barang as kode_barang_utama, barang.nama_barang as nama, barang_masuk.harga_beli as harga_beli_masuk, barang.harga as harga, barang.stok as stok, barang_masuk.jumlah_beli as jumlah_beli_masuk, jumlah_jual');
    $this->db->from('barang');
    $this->db->join('barang_masuk', 'barang_masuk.kode_barang = barang.kode_barang');
    $this->db->join('barang_keluar', 'barang_keluar.kode_barang = barang_masuk.kode_barang');

    $q=$this->db->get();
    return $q->result();
    }

}