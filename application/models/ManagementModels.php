<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class ManagementModels extends CI_Model {
    protected $managementunits = 'managementunits';

    public function save($data) {
        if ($this->check_title($data)) {
            $this->db->insert($this->managementunits, $data);
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
        $condition = 'title ="'.$data['title'].'"';
        $this->db->select('id_about,title, description, status');
        $this->db->from($this->managementunits);
        $this->db->where($condition);
        $query =  $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function edit($data) {
        $condition = 'id_about = "'.$data['id_about'].'"';
        $this->db->set('title', $data['title']);
        $this->db->set('description', $data['description']);
		$this->db->set('status', $data['status']);
        $this->db->where($condition);
        $results = $this->db->update($this->managementunits, $data);
        if ($results) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete($data) {
        if (isset($data)) {
            $condition = 'id_about = "' . $data['id_about'] . '"';
            $this->db->where($condition);
            $this->db->delete($this->managementunits);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id_about,title, description,status');
        $this->db->from($this->managementunits);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->managementunits,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->managementunits)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id_about = "'.$data['id_about'].'"';
        $this->db->select('id_about,title, description,status');
        $this->db->from($this->managementunits);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }

}
