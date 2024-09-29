<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class taDesasModels extends CI_Model {
    protected $ta_desas = 'ta_desas';

    public function save($data) {

        $this->db->insert($this->ta_desas, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function edit($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->set('area_code', $data['area_code']);
        $this->db->set('kode_desa', $data['kode_desa']);
		$this->db->set('program_year', $data['program_year']);
		$this->db->set('active', $data['active']);
        $this->db->where($condition);
        $results = $this->db->update($this->ta_desas, $data);
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
            $this->db->delete($this->ta_desas);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id, area_code, kode_desa, program_year, active');
        $this->db->from($this->ta_desas);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->ta_desas,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->ta_desas)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->select('id, area_code, kode_desa, program_year, active');
        $this->db->from($this->ta_desas);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }

}
