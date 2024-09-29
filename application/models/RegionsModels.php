<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class regionsModels extends CI_Model {
    protected $regions = 'regions';

    public function save($data) {
        if ($this->check_title($data)) {
            $this->db->insert($this->regions, $data);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function check_title($data) {
        $condition = 'id ="'.$data['id'].'"';
        $this->db->select('id, region_code,name, active_status');
        $this->db->from($this->regions);
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
        $this->db->set('region_code', $data['region_code']);
        $this->db->set('name', $data['name']);
		$this->db->set('active_status', $data['active_status']);
        $this->db->where($condition);
        $results = $this->db->update($this->regions, $data);
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
            $this->db->delete($this->regions);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id, region_code,name, active_status');
        $this->db->from($this->regions);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->regions,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->regions)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->select('id, region_code,name, active_status');
        $this->db->from($this->regions);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }

}
