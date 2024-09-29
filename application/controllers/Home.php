<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
        // Load form helper library
        $this->load->helper('form');

        $this->load->helper('url');

        // Load form validation library
        $this->load->library('form_validation');

        // Template, ckeditor, session, encrypt
        $this->load->library(array('session', 'pagination'));
		$this->load->library('user_agent');
		
		$this->load->model('desaModels','desa');
		$this->load->model('farmersModels','farmer');
		$this->load->model('fieldsModels','fields');
		$this->load->model('kabupatenModels','kabupaten');
		$this->load->model('kecamatanModels','kecamatan');
		$this->load->model('managementModels','management');
		$this->load->model('provinceModels','province');
		$this->load->model('regionsModels','regions');
		$this->load->model('taDesasModels','taDesas');
		$this->load->model('targetAreaModels','target');
	}

	public function index()
	{
		$data = Array(
			'desa' => $this->desa->get_data(),
			'farmer' => $this->farmer->get_data(),
			'fields' => $this->fields->get_data(),
			'kabupaten' => $this->kabupaten->get_data(),
			'kecamatan' => $this->kecamatan->get_data(),
			'province' => $this->province->get_data(),
			'regions' =>  $this->regions->get_data(),
			'ta_desas' =>  $this->taDesas->get_data(),
			'target_area' => $this->target->get_data(),
			'chartFF' => $this->farmer->get_chartFarmerByFF()
		);

		$this->load->view('home', $data);
	}

	public function desa() {
		if(!empty($this->input->post('desa'))) {
			$data = array(
				'desa' => $this->input->post('desa'),
			);
			$result = array(
				'data_desa' =>$this->farmer->get_dataFarmerByDesa($data)
			);
			$this->load->view('desa', $result);
		} else {
			return null;
		}
	}

	public function kecamatan() {
		if(!empty($this->input->post('kecamatan'))) {
			$data = array(
				'kecamatan' => $this->input->post('kecamatan'),
			);

			$result = array(
				'data_kecamatan' =>$this->farmer->get_dataFarmerByKecamatan($data)
			);
			$this->load->view('kecamatan',$result);
		} else {
			return null;
		}
	}

	public function kabupaten() {
		if(!empty($this->input->post('kabupaten'))) {
			$data = array(
				'kabupaten' => $this->input->post('kabupaten'),
			);
			$result = array(
				'data_kabupaten' =>$this->farmer->get_dataFarmerByKabupaten($data)
			);
			$this->load->view('kabupaten',$result);
		} else {
			return null;
		}
	}

	public function province() {
		ini_set('memory_limit', '-1');
		if(!empty($this->input->post('province'))) {
			$data = array(
				'province' => $this->input->post('province'),
			);
			$result = array(
				'data_province' =>$this->farmer->get_dataFarmerByProvince($data)
			);
			$this->load->view('province', $result);
		} else {
			return null;
		}
	}
}
