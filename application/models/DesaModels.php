<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class desaModels extends CI_Model {
    protected $desas = 'desas';

    public function save($data) {
        if ($this->check_nama($data)) {
            $this->db->insert($this->desas, $data);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function check_nama($data) {
        $condition = 'kode_desa ="'.$data['kode_desa'].'"';
        $this->db->select('id,kode_desa, name, kode_kecamatan,kode_ta, post_code, program_year, status');
        $this->db->from($this->desas);
        $this->db->where($condition);
        $query =  $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function edit($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->set('kode_desa', $data['kode_desa']);
        $this->db->set('name', $data['name']);
		$this->db->set('kode_kecamatan', $data['kode_kecamatan']);
		$this->db->set('kode_ta', $data['kode_ta']);
		$this->db->set('post_code', $data['post_code']);
		$this->db->set('program_year', $data['program_year']);
		$this->db->set('status', $data['status']);
        $this->db->where($condition);
        $results = $this->db->update($this->desas, $data);
        if ($results) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete($data) {
        if (isset($data)) {
            $condition = 'id = "' . $data['id'] . '"';
            $this->db->where($condition);
            $this->db->delete($this->desas);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id,kode_desa, name, kode_kecamatan,kode_ta, post_code, program_year, status');
        $this->db->from($this->desas);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->desas,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->desas)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->select('id,kode_desa, name, kode_kecamatan,kode_ta, post_code, program_year, status');
        $this->db->from($this->desas);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }

}
