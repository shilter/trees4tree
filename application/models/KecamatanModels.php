<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class KecamatanModels extends CI_Model {
    protected $kecamatans = 'kecamatans';

    public function save($data) {
        $this->db->insert($this->kecamatans, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function edit($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->set('kode_kecamatan', $data['kode_kecamatan']);
        $this->db->set('name', $data['name']);
		$this->db->set('kabupaten_no', $data['kabupaten_no']);
        $this->db->where($condition);
        $results = $this->db->update($this->kecamatans, $data);
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
            $this->db->delete($this->kecamatans);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id,kode_kecamatan,name,kabupaten_no');
        $this->db->from($this->kecamatans);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->kecamatans,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->kecamatans)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->select('id, kode_kecamatan, name, kabupaten_no');
        $this->db->from($this->kecamatans);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }

}
