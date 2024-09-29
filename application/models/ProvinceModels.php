<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class ProvinceModels extends CI_Model {
    protected $provinces = 'provinces';

    public function save($data) {
        $this->db->insert($this->provinces, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function edit($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->set('province_code', $data['province_code']);
        $this->db->set('name', $data['name']);
        $this->db->where($condition);
        $results = $this->db->update($this->provinces, $data);
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
            $this->db->delete($this->provinces);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id,province_code, name');
        $this->db->from($this->provinces);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->provinces,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->provinces)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->select('id,province_code, name');
        $this->db->from($this->provinces);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }

}
