<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'supplier/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'supplier/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'supplier/index.html';
            $config['first_url'] = base_url() . 'supplier/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Supplier_model->total_rows($q);
        $supplier = $this->Supplier_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'supplier_data' => $supplier,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'supplier/supplier_list',
            'judul' => 'Data Supplier',
        );
        $this->load->view('v_index', $data);
    }

    function get_supplier_by_id($id)
    {
        $data = array(
            'supplier_data' =>$this->Supplier_model->get_by_kode($id),
            'konten' => 'supplier/supplier_list',
            'judul' => 'Data Supplier',

        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Supplier_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_supplier' => $row->id_supplier,
		'kode_supplier' => $row->kode_supplier,
		'nama_supplier' => $row->nama_supplier,
        'alamat' => $row->alamat,
        'nomer_hp' => $row->nomer_hp,
        'barang_jual' => $row->barang_jual,


	    );
            $this->load->view('supplier/supplier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('supplier/create_action'),
	    'id_supplier' => set_value('id_supplier'),
	    'kode_supplier' => set_value('kode_supplier'),
        'nama_supplier' => set_value('nama_supplier'),
        'alamat' => set_value('alamat'),
	    'nomer_hp' => set_value('nomer_hp'),
        'barang_jual' => set_value('barang_jual'),
        'konten' => 'supplier/supplier_form',
            'judul' => 'Data Supplier',
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
        'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
		'nomer_hp' => $this->input->post('nomer_hp',TRUE),
        'barang_jual' => $this->input->post('barang_jual',TRUE),
	    );

            $this->Supplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('supplier'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Supplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('supplier/update_action'),
		'id_supplier' => set_value('id_supplier', $row->id_supplier),
		'kode_supplier' => set_value('kode_supplier', $row->kode_supplier),
        'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
        'alamat' => set_value('alamat', $row->alamat),
		'nomer_hp' => set_value('nomer_hp', $row->nomer_hp),
        'barang_jual' => set_value('barang_jual', $row->barang_jual),
        'konten' => 'supplier/supplier_form',
            'judul' => 'Data Supplier',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_supplier', TRUE));
        } else {
            $data = array(
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
        'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
		'nomer_hp' => $this->input->post('nomer_hp',TRUE),
        'barang_jual' => $this->input->post('barang_jual',TRUE),
	    );

            $this->Supplier_model->update($this->input->post('id_supplier', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('supplier'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Supplier_model->get_by_id($id);

        if ($row) {
            $this->Supplier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_supplier', 'kode supplier', 'trim|required');
    $this->form_validation->set_rules('nama_supplier', 'nama supplier', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('nomer_hp', 'nomer_hp', 'trim|required');
    $this->form_validation->set_rules('barang_jual', 'barang_jual', 'trim|required');


	$this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
