<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_keluar_model');
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'barang_keluar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'barang_keluar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'barang_keluar/index.html';
            $config['first_url'] = base_url() . 'barang_keluar/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Barang_keluar_model->total_rows($q);
        /*$barang_keluar = $this->Barang_keluar_model->get_limit_data($config['per_page'], $start, $q);*/
        $barang_keluar = $this->Barang_keluar_model->get_barang_keluar();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'barang_keluar_data' => $barang_keluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'barang_keluar/barang_keluar_list',
            'judul' => 'Data Barang Keluar',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Barang_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang_keluar' => $row->id_barang_keluar,
        'nama_barang' => $row->nama_barang,
		'kode_barang' => $row->kode_barang,
		'tanggal' => $row->tanggal,
		'jumlah_jual' => $row->jumlah_jual,
        'jumlah_jual' => $row->jumlah_jual,
        

	    );
            $this->load->view('barang_keluar/barang_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang_keluar/create_action'),
	    'id_barang_keluar' => set_value('id_barang_keluar'),
	    'kode_barang' => set_value('kode_barang'),
        'nama_barang' => set_value('nama_barang'),

	   
	    'jumlah_jual' => set_value('jumlah_jual'),
        'konten' => 'barang_keluar/barang_keluar_form',
            'judul' => 'Data Barang Keluar',
	);
        $data['semua_barang']= $this->Barang_model->get_barang();
        $this->load->view('v_index', $data);
    }

    public function cari()
    {
        $kode_barang=$_GET['kode_barang'];
        $cari =$this->Barang_keluar_model->cari($kode_barang)->result();
        echo json_encode($cari);
    } 
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
        'nama_barang' => $this->input->post('nama_barang',TRUE),
		
		'jumlah_jual' => $this->input->post('jumlah_jual',TRUE),
	    );

            $this->Barang_keluar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('barang_keluar/update_action'),
		'id_barang_keluar' => set_value('id_barang_keluar', $row->id_barang_keluar),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'tgl_keluar' => set_value('tgl_keluar', $row->tgl_keluar),
		'jumlah_jual' => set_value('jumlah_jual', $row->jumlah_jual),
        'konten' => 'barang_keluar/barang_keluar_form',
        'judul' => 'Data Barang Keluar',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }

     public function transaksi_penjualan_action() {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'kode_barang' => $this->input->post('kode_barang',TRUE),
        'nama_barang' => $this->input->post('nama_barang',TRUE),
        
        'jumlah_item' => $this->input->post('jumlah_item',TRUE),
        'harga' => $this->input->post('harga',TRUE),

        );

            $this->transaksi_penjualan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_keluar'));
        }
     }

    public function update_action() 

    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang_keluar', TRUE));
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'tgl_keluar' => $this->input->post('tgl_keluar',TRUE),
		'jumlah_jual' => $this->input->post('jumlah_jual',TRUE),
	    );

            $this->Barang_keluar_model->update($this->input->post('id_barang_keluar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_keluar_model->get_by_id($id);

        if ($row) {
            $this->Barang_keluar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
	$this->form_validation->set_rules('tgl_keluar', 'tgl keluar', 'trim|required');
	$this->form_validation->set_rules('jumlah_jual', 'jumlah_jual', 'trim|required');

	$this->form_validation->set_rules('id_barang_keluar', 'id_barang_keluar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang_keluar.php */
/* Location: ./application/controllers/Barang_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-10 15:13:50 */
/* http://harviacode.com */