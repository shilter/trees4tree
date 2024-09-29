<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class targetAreaModels extends CI_Model {
    protected $target_areas = 'target_areas';

    public function save($data) {
        if ($this->check_name($data)) {
            $this->db->insert($this->target_areas, $data);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function check_name($data) {
        $this->db->select('id,area_code, name, mu_no, active, kabupaten_no,province_code, luas, program_year');
        $this->db->from($this->target_areas);
        $this->db->where('name', $data['name']);
        $query =  $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function edit($data) {
        $this->db->set('area_code', $data['area_code']);
        $this->db->set('name', $data['name']);
		$this->db->set('mu_no', $data['mu_no']);
		$this->db->set('active', $data['active']);
        $this->db->set('kabupaten_no', $data['kabupaten_no']);
		$this->db->set('province_code', $data['province_code']);
		$this->db->set('luas', $data['luas']);
        $this->db->set('program_year', $data['program_year']);
        $this->db->where('id', $data['id']);
        $results = $this->db->update($this->target_areas, $data);
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
            $this->db->delete($this->target_areas);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id,area_code, name, mu_no, active, kabupaten_no,province_code, luas, program_year');
        $this->db->from($this->target_areas);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->target_areas,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->target_areas)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->select('id,area_code, name, mu_no, active, kabupaten_no,province_code, luas, program_year');
        $this->db->from($this->target_areas);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }

}
