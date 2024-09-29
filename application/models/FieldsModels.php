<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class fieldsModels extends CI_Model {
    protected $field_facilatators = 'field_facilitators';

    public function save($data) {
        $this->db->insert($this->field_facilatators, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function edit($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->set('ff_no', $data['ff_no']);
        $this->db->set('fc_no', $data['fc_no']);
		$this->db->set('name', $data['name']);
		$this->db->set('birthday', $data['birthday']);
        $this->db->set('religion', $data['religion']);
		$this->db->set('gender', $data['gender']);
		$this->db->set('marrital', $data['marrital']);
        $this->db->set('join_date', $data['join_date']);
		$this->db->set('ktp_no', $data['ktp_no']);

		$this->db->set('phone', $data['phone']);
        $this->db->set('address', $data['address']);
		$this->db->set('village', $data['village']);
		$this->db->set('kecamatan', $data['kecamatan']);
        $this->db->set('city', $data['city']);
		$this->db->set('province', $data['province']);

		$this->db->set('post_code', $data['post_code']);
        $this->db->set('mu_no', $data['mu_no']);
		$this->db->set('working_area', $data['working_area']);
		$this->db->set('target_area', $data['target_area']);
        $this->db->set('bank_account', $data['bank_account']);
		$this->db->set('bank_branch', $data['bank_branch']);

		$this->db->set('bank_name', $data['bank_name']);
        $this->db->set('ff_photo', $data['ff_photo']);
		$this->db->set('ff_photo_path', $data['ff_photo_path']);
		$this->db->set('active', $data['active']);
        $this->db->set('user_id', $data['user_id']);

        $this->db->where($condition);
        $results = $this->db->update($this->field_facilatators, $data);
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
            $this->db->delete($this->field_facilatators);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id,ff_no, fc_no,name, birthday, religion, gender, marrital, join_date, ktp_no, phone, address, village, kecamatan, city, province, post_code, mu_no, working_area, target_area, bank_account, bank_branch, bank_name, ff_photo, ff_photo_path, active, user_id');
        $this->db->from($this->field_facilatators);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->field_facilatators,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->field_facilatators)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->select('id,ff_no, fc_no,name, birthday, religion, gender, marrital, join_date, ktp_no, phone, address, village, kecamatan, city, province, post_code, mu_no, working_area, target_area, bank_account, bank_branch, bank_name, ff_photo, ff_photo_path, active, user_id');
        $this->db->from($this->field_facilatators);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }

}
