<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class farmersModels extends CI_Model {
    protected $farmers = 'farmers';

    public function save($data) {

        $this->db->insert($this->farmers, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function edit($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->set('farmer_no', $data['farmer_no']);
        $this->db->set('name', $data['name']);
		$this->db->set('nickname', $data['nickname']);
		$this->db->set('birthday', $data['birthday']);
        $this->db->set('religion', $data['religion']);
		$this->db->set('ethnic', $data['ethnic']);
		$this->db->set('origin', $data['origin']);
		$this->db->set('gender', $data['gender']);
		$this->db->set('join_date', $data['join_date']);
		$this->db->set('number_family_member', $data['number_family_member']);
		$this->db->set('ktp_no', $data['ktp_no']);
		$this->db->set('phone', $data['phone']);
		$this->db->set('rt', $data['rt']);
		$this->db->set('rw', $data['rw']);
		$this->db->set('address', $data['address']);
		$this->db->set('total_land_owned', $data['total_land_owned']);
		$this->db->set('legal_land_categories', $data['legal_land_categories']);
		$this->db->set('project_model', $data['project_model']);
		$this->db->set('village', $data['village']);
		$this->db->set('kecamatan', $data['kecamatan']);
		$this->db->set('city', $data['city']);
		$this->db->set('province', $data['province']);
		$this->db->set('post_code', $data['post_code']);
		$this->db->set('mu_no', $data['mu_no']);
		$this->db->set('target_area', $data['target_area']);
		$this->db->set('group_no', $data['group_no']);
		$this->db->set('mou_no', $data['mou_no']);
		$this->db->set('main_income', $data['main_income']);
		$this->db->set('side_income', $data['side_income']);
		$this->db->set('avg_income_permonth', $data['avg_income_permonth']);
		$this->db->set('is_farmer_patner_helping', $data['is_farmer_patner_helping']);
		$this->db->set('avg_food_outcome_monthly', $data['avg_food_outcome_monthly']);
		$this->db->set('avg_farming_income_yearly', $data['avg_farming_income_yearly']);
		$this->db->set('avg_wood_bussines_income_yearly', $data['avg_wood_bussines_income_yearly']);
		$this->db->set('avg_farm_income_yearly', $data['avg_farm_income_yearly']);
		$this->db->set('avg_fishery_income_yearly', $data['avg_fishery_income_yearly']);
		$this->db->set('avg_nature_tourism_yearly', $data['avg_nature_tourism_yearly']);
		$this->db->set('avg_other_source_income_yearly', $data['avg_other_source_income_yearly']);
		$this->db->set('general_medecine_source', $data['general_medecine_source']);
		$this->db->set('general_food_source', $data['general_food_source']);
		$this->db->set('general_drink_water_source', $data['general_drink_water_source']);
		$this->db->set('general_clean_water_source', $data['general_clean_water_source']);
		$this->db->set('active', $data['active']);
		$this->db->set('user_id', $data['user_id']);
		$this->db->set('created_at', $data['created_at']);
		$this->db->set('updated_at', $data['updated_at']);
		$this->db->set('ktp_document', $data['ktp_document']);
		$this->db->set('signature', $data['signature']);
		$this->db->set('farmer_profile', $data['farmer_profile']);
		$this->db->set('marrital_status', $data['marrital_status']);
		$this->db->set('main_job', $data['main_job']);
		$this->db->set('side_job', $data['side_job']);
		$this->db->set('education', $data['education']);
		$this->db->set('non_format_education', $data['non_format_education']);
		$this->db->set('is_dell', $data['is_dell']);
		$this->db->set('complete_data', $data['complete_data']);
		$this->db->set('approve', $data['approve']);
		$this->db->set('is_reparticipated', $data['is_reparticipated']);
		$this->db->set('farmer_carbon_status', $data['farmer_carbon_status']);
        $this->db->where($condition);
        $results = $this->db->update($this->farmers, $data);
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
            $this->db->delete($this->farmers);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_data() {
        $this->db->select('id,farmer_no, name, nickname, birthday, religion,ethnic,origin,gender,join_date, number_family_member,ktp_no,phone,rt,rw,address,total_land_owned,legal_land_categories,project_model,village,kecamatan,city,province,post_code,mu_no,target_area,group_no,mou_no,main_income,side_income,avg_income_permonth,is_farmer_partner_helping,avg_food_outcome_monthly,avg_farming_income_yearly,avg_wood_bussines_income_yearly,avg_farm_income_yearly,avg_fishery_income_yearly,avg_nature_tourism_yearly,avg_other_source_income_yearly,general_medicine_source,general_food_source,general_drink_water_source,general_clean_water_source,active,user_id,created_at,updated_at,ktp_document,signature,farmer_profile,marrital_status,main_job,side_job,education,non_formal_education,is_dell,complete_data,approve,is_reparticipated,farmer_carbon_status');
        $this->db->from($this->farmers);
        $query = $this->db->get();
        return $query->result();
    }

    function data($number,$offset){
        return $query = $this->db->get($this->farmers,$number,$offset)->result();
    }

    public function get_rows() {
        return $this->db->get($this->farmers)->num_rows();
    }

    public function get_data_by($data) {
        $condition = 'id = "'.$data['id'].'"';
        $this->db->select('id,farmer_no, name, nickname, birthday, religion,ethnic,origin,gender,join_date, number_family_member,ktp_no,phone,rt,rw,address,total_land_owned,legal_land_categories,project_model,village,kecamatan,city,province,post_code,mu_no,target_area,group_no,mou_no,main_income,side_income,avg_income_permonth,is_farmer_partner_helping,avg_food_outcome_monthly,avg_farming_income_yearly,avg_wood_bussines_income_yearly,avg_farm_income_yearly,avg_fishery_income_yearly,avg_nature_tourism_yearly,avg_other_source_income_yearly,general_medicine_source,general_food_source,general_drink_water_source,general_clean_water_source,active,user_id,created_at,updated_at,ktp_document,signature,farmer_profile,marrital_status,main_job,side_job,education,non_formal_education,is_dell,complete_data,approve,is_reparticipated,farmer_carbon_status');
        $this->db->from($this->farmers);
        $this->db->where($condition);
        $query =  $this->db->get();
        return $query->result();
    }	

	public function get_dataFarmerAll() {
		$sql = 'SELECT frm.id, frm.farmer_no, frm.nickname, frm.birthday, frm.religion, frm.ethnic, frm.origin, frm.gender, frm.join_date, frm.number_family_member, frm.ktp_no, frm.ktp_document, frm.phone, frm.rt, frm.rw, frm.address, frm.total_land_owned, frm.legal_land_categories, frm.project_model,
		(SELECT des.name from desas as des WHERE des.kode_desa = frm.village ) as village_frm,
		(SELECT kec.name from kecamatans as kec WHERE kec.kode_kecamatan = frm.kecamatan ) as kecamatan_frm, (SELECT kabp.name from kabupatens as kabp WHERE kabp.kabupaten_no = frm.city ) as kabupaten_frm, (SELECT pro.name from provinces as pro WHERE pro.province_code = frm.province ) as province_frm, frm.post_code, (SELECT mu.name from managementunits as mu WHERE mu.mu_no = frm.mu_no ) as mu_no_frm, 
		(SELECT ta.name from target_areas as ta WHERE ta.area_code = frm.target_area ) as target_area_frm, frm.group_no, frm.mou_no,frm.main_income,frm.side_income,frm.avg_income_permonth,frm.is_farmer_partner_helping,frm.avg_food_outcome_monthly,frm.avg_farming_income_yearly,frm.avg_wood_bussines_income_yearly,frm.avg_farm_income_yearly,frm.avg_fishery_income_yearly,frm.avg_nature_tourism_yearly,frm.avg_other_source_income_yearly,frm.general_medicine_source,frm.general_food_source,frm.general_drink_water_source,frm.general_clean_water_source,frm.active,frm.user_id,frm.created_at,frm.updated_at,frm.ktp_document,frm.signature,frm.farmer_profile,frm.marrital_status,frm.main_job,frm.side_job,frm.education,frm.non_formal_education,frm.is_dell,frm.complete_data,frm.approve,frm.is_reparticipated,frm.farmer_carbon_status,
		ff.bank_account,ff.bank_branch,ff.bank_name, ff.name, ff.gender, ff.phone, ff.address, (SELECT des.name from desas as des WHERE des.kode_desa = ff.village ) as village_ff FROM farmers as frm LEFT join field_facilitators as ff on frm.user_id = ff.user_id;';
		$query = $this->db->query($sql);
		return  $query->result();
	}

	public function get_dataFarmerByDesa($data) {
		if (!empty($data)) {
			$sql = 'SELECT frm.id, frm.farmer_no, frm.nickname, frm.birthday, frm.religion, frm.ethnic, frm.origin, frm.gender, frm.join_date, frm.number_family_member, frm.ktp_no, frm.ktp_document, frm.phone, frm.rt, frm.rw, frm.address, frm.total_land_owned, frm.legal_land_categories, frm.project_model,
			(SELECT des.name from desas as des WHERE des.kode_desa = frm.village ) as village_frm,
			(SELECT kec.name from kecamatans as kec WHERE kec.kode_kecamatan = frm.kecamatan ) as kecamatan_frm, (SELECT kabp.name from kabupatens as kabp WHERE kabp.kabupaten_no = frm.city ) as kabupaten_frm, (SELECT pro.name from provinces as pro WHERE pro.province_code = frm.province ) as province_frm, frm.post_code, (SELECT mu.name from managementunits as mu WHERE mu.mu_no = frm.mu_no ) as mu_no_frm, 
			(SELECT ta.name from target_areas as ta WHERE ta.area_code = frm.target_area ) as target_area_frm, frm.group_no, frm.mou_no,frm.main_income,frm.side_income,frm.avg_income_permonth,frm.is_farmer_partner_helping,frm.avg_food_outcome_monthly,frm.avg_farming_income_yearly,frm.avg_wood_bussines_income_yearly,frm.avg_farm_income_yearly,frm.avg_fishery_income_yearly,frm.avg_nature_tourism_yearly,frm.avg_other_source_income_yearly,frm.general_medicine_source,frm.general_food_source,frm.general_drink_water_source,frm.general_clean_water_source,frm.active,frm.user_id,frm.created_at,frm.updated_at,frm.ktp_document,frm.signature,frm.farmer_profile,frm.marrital_status,frm.main_job,frm.side_job,frm.education,frm.non_formal_education,frm.is_dell,frm.complete_data,frm.approve,frm.is_reparticipated,frm.farmer_carbon_status,
			ff.bank_account,ff.bank_branch,ff.bank_name, ff.name as ff_name, ff.gender, ff.phone, ff.address, (SELECT des.name from desas as des WHERE des.kode_desa = ff.village ) as village_ff FROM farmers as frm LEFT join field_facilitators as ff on frm.user_id = ff.user_id
			WHERE frm.village LIKE "'.$data['desa'].'";';
			$query = $this->db->query($sql);
			return  $query->result();
		} else {
			return null;
		}
	}

	public function get_chartFarmerByFF() {
		$sql = 'SELECT count(*) as jumlah_farmers, frm.user_id FROM farmers as frm LEFT JOIN field_facilitators as ff on ff.user_id = frm.user_id GROUP BY frm.user_id;';
		$query = $this->db->query($sql);
		return  $query->result();
	}

	public function get_dataFarmerByKecamatan($data) {
		if (!empty($data)) {
			$sql = 'SELECT frm.id, frm.farmer_no, frm.nickname, frm.birthday, frm.religion, frm.ethnic, frm.origin, frm.gender, frm.join_date, frm.number_family_member, frm.ktp_no, frm.ktp_document, frm.phone, frm.rt, frm.rw, frm.address, frm.total_land_owned, frm.legal_land_categories, frm.project_model,
			(SELECT des.name from desas as des WHERE des.kode_desa = frm.village ) as village_frm,
			(SELECT kec.name from kecamatans as kec WHERE kec.kode_kecamatan = frm.kecamatan ) as kecamatan_frm, (SELECT kabp.name from kabupatens as kabp WHERE kabp.kabupaten_no = frm.city ) as kabupaten_frm, (SELECT pro.name from provinces as pro WHERE pro.province_code = frm.province ) as province_frm, frm.post_code, (SELECT mu.name from managementunits as mu WHERE mu.mu_no = frm.mu_no ) as mu_no_frm, 
			(SELECT ta.name from target_areas as ta WHERE ta.area_code = frm.target_area ) as target_area_frm, frm.group_no, frm.mou_no,frm.main_income,frm.side_income,frm.avg_income_permonth,frm.is_farmer_partner_helping,frm.avg_food_outcome_monthly,frm.avg_farming_income_yearly,frm.avg_wood_bussines_income_yearly,frm.avg_farm_income_yearly,frm.avg_fishery_income_yearly,frm.avg_nature_tourism_yearly,frm.avg_other_source_income_yearly,frm.general_medicine_source,frm.general_food_source,frm.general_drink_water_source,frm.general_clean_water_source,frm.active,frm.user_id,frm.created_at,frm.updated_at,frm.ktp_document,frm.signature,frm.farmer_profile,frm.marrital_status,frm.main_job,frm.side_job,frm.education,frm.non_formal_education,frm.is_dell,frm.complete_data,frm.approve,frm.is_reparticipated,frm.farmer_carbon_status
			, ff.bank_account,ff.bank_branch,ff.bank_name , ff.name as ff_name, ff.gender, ff.phone, ff.address, (SELECT des.name from desas as des WHERE des.kode_desa = ff.village ) as village_ff FROM farmers as frm LEFT join field_facilitators as ff on frm.user_id = ff.user_id
			WHERE frm.kecamatan LIKE "'.$data['kecamatan'].'";';
			$query = $this->db->query($sql);
			return  $query->result();
		} else {
			return null;
		}
	}

	public function get_dataFarmerByKabupaten($data) {
		if (!empty($data)) {
			$sql = 'SELECT frm.id, frm.farmer_no, frm.nickname, frm.birthday, frm.religion, frm.ethnic, frm.origin, frm.gender, frm.join_date, frm.number_family_member, frm.ktp_no, frm.ktp_document, frm.phone, frm.rt, frm.rw, frm.address, frm.total_land_owned, frm.legal_land_categories, frm.project_model,
			(SELECT des.name from desas as des WHERE des.kode_desa = frm.village ) as village_frm,
			(SELECT kec.name from kecamatans as kec WHERE kec.kode_kecamatan = frm.kecamatan ) as kecamatan_frm, (SELECT kabp.name from kabupatens as kabp WHERE kabp.kabupaten_no = frm.city ) as kabupaten_frm, (SELECT pro.name from provinces as pro WHERE pro.province_code = frm.province ) as province_frm, frm.post_code, (SELECT mu.name from managementunits as mu WHERE mu.mu_no = frm.mu_no ) as mu_no_frm, 
			(SELECT ta.name from target_areas as ta WHERE ta.area_code = frm.target_area ) as target_area_frm, frm.group_no, frm.mou_no,frm.main_income,frm.side_income,frm.avg_income_permonth,frm.is_farmer_partner_helping,frm.avg_food_outcome_monthly,frm.avg_farming_income_yearly,frm.avg_wood_bussines_income_yearly,frm.avg_farm_income_yearly,frm.avg_fishery_income_yearly,frm.avg_nature_tourism_yearly,frm.avg_other_source_income_yearly,frm.general_medicine_source,frm.general_food_source,frm.general_drink_water_source,frm.general_clean_water_source,frm.active,frm.user_id,frm.created_at,frm.updated_at,frm.ktp_document,frm.signature,frm.farmer_profile,frm.marrital_status,frm.main_job,frm.side_job,frm.education,frm.non_formal_education,frm.is_dell,frm.complete_data,frm.approve,frm.is_reparticipated,frm.farmer_carbon_status
			, ff.bank_account,ff.bank_branch,ff.bank_name, ff.name as ff_name, ff.gender, ff.phone, ff.address, (SELECT des.name from desas as des WHERE des.kode_desa = ff.village ) as village_ff FROM farmers as frm LEFT join field_facilitators as ff on frm.user_id = ff.user_id
			WHERE frm.city LIKE "'.$data['kabupaten'].'";';
			$query = $this->db->query($sql);
			return  $query->result();
		} else {
			return null;
		}
	}

	public function get_dataFarmerByProvince($data) {
		if (!empty($data)) {
			$sql = 'SELECT frm.id, frm.farmer_no, frm.nickname, frm.birthday, frm.religion, frm.ethnic, frm.origin, frm.gender, frm.join_date, frm.number_family_member, frm.ktp_no, frm.ktp_document, frm.phone, frm.rt, frm.rw, frm.address, frm.total_land_owned, frm.legal_land_categories, frm.project_model,
			(SELECT des.name from desas as des WHERE des.kode_desa = frm.village ) as village_frm,
			(SELECT kec.name from kecamatans as kec WHERE kec.kode_kecamatan = frm.kecamatan ) as kecamatan_frm, (SELECT kabp.name from kabupatens as kabp WHERE kabp.kabupaten_no = frm.city ) as kabupaten_frm, (SELECT pro.name from provinces as pro WHERE pro.province_code = frm.province ) as province_frm, frm.post_code, (SELECT mu.name from managementunits as mu WHERE mu.mu_no = frm.mu_no ) as mu_no_frm, 
			(SELECT ta.name from target_areas as ta WHERE ta.area_code = frm.target_area ) as target_area_frm, frm.group_no, frm.mou_no,frm.main_income,frm.side_income,frm.avg_income_permonth,frm.is_farmer_partner_helping,frm.avg_food_outcome_monthly,frm.avg_farming_income_yearly,frm.avg_wood_bussines_income_yearly,frm.avg_farm_income_yearly,frm.avg_fishery_income_yearly,frm.avg_nature_tourism_yearly,frm.avg_other_source_income_yearly,frm.general_medicine_source,frm.general_food_source,frm.general_drink_water_source,frm.general_clean_water_source,frm.active,frm.user_id,frm.created_at,frm.updated_at,frm.ktp_document,frm.signature,frm.farmer_profile,frm.marrital_status,frm.main_job,frm.side_job,frm.education,frm.non_formal_education,frm.is_dell,frm.complete_data,frm.approve,frm.is_reparticipated,frm.farmer_carbon_status
			, ff.bank_account,ff.bank_branch,ff.bank_name, ff.name as ff_name, ff.gender, ff.phone, ff.address, (SELECT des.name from desas as des WHERE des.kode_desa = ff.village ) as village_ff FROM farmers as frm LEFT join field_facilitators as ff on frm.user_id = ff.user_id
			WHERE frm.province LIKE "'.$data['province'].'";';
			$query = $this->db->query($sql);
			return  $query->result();
		} else {
			return null;
		}
	}

}
