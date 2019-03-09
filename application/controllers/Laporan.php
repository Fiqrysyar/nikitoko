<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Laporan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Laporan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Laporan/index.html';
            $config['first_url'] = base_url() . 'Laporan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Laporan_model->total_rows($q);
        $Laporan = $this->Laporan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'Laporan_data' => $Laporan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'laporan/laporanv',
            'judul' => 'Laporan Barang',
        );
        $this->load->view('v_index', $data);
    }

}

