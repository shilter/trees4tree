<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class kabupatenModels extends CI_Model {
    protected $kabupatens = 'kabupatens';

    public function save($data) {
        $this->db->insert($this->kabupatens, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function edit($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->set('kabupaten_no', $data['kabupaten_no']);
        $this->db->set('name', $data['name']);
		$this->db->set('province_code', $data['province_code']);
		$this->db->set('created_at', $data['created_at']);
        $this->db->set('updated_at', $data['updated_at']);
		$this->db->set('kab_code', $data['kab_code']);
        $this->db->where($condition);
        $results = $this->db->update($this->kabupatens, $data);
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
            $this->db->delete($this->kabupatens);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id,kabupaten_no, name, province_code, created_at, updated_at, kab_code');
        $this->db->from($this->kabupatens);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->kabupatens,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->kabupatens)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->select('id,kabupaten_no, name, province_code, created_at, updated_at, kab_code');
        $this->db->from($this->kabupatens);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }

}
