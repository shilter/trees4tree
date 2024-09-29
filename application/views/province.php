<table class="table table-hover table-sm" id="tbl-prov">
	<thead>
		<tr>
			<th>Farmer No</th>
			<th>Nickname</th>
			<th>Birthday</th>
			<th>Religion</th>
			<th>Etnic</th>
			<th>Origin</th>
			<th>Gender</th>
			<th>Join Date</th>
			<th>Number Family</th>
			<th>Ktp</th>
			<th>Ktp Document</th>
			<th>Phone</th>
			<th>Rt Rw</th>
			<th>Address</th>
			<th>Total Land</th>
			<th>Legal Land</th>
			<th>Project Model</th>
			<th>Village</th>
			<th>Kecamatan</th>
			<th>Kabupaten</th>
			<th>Province</th>
			<th>Mu No</th>
			<th>Target Area</th>
			<th>Group No</th>
			<th>Mou No</th>
			<th>Main Income</th>
			<th>Side Income</th>
			<th>Avg Income Per Month</th>
			<th>Patner Helping</th>
			<th>Avg Food Outcome Monthly</th>
			<th>Avg Farming Income Yearly</th>
			<th>Avg Wood Bussiness Income Yearly</th>
			<th>Avg Farm Income Yearly</th>
			<th>Avg Fishery Income Yearly</th>
			<th>Avg Nature Tourism Yearly</th>
			<th>Avg Other Source Yearly</th>
			<th>General Medecine Source</th>
			<th>General Food Source</th>
			<th>General Drink Water Source</th>
			<th>General Clean Water Source</th>
			<th>Active</th>
			<th>Fields Facilator</th>
			<th>Nama</th>
			<th>Bank Account</th>
			<th>Bank Branch</th>
			<th>Bank Name</th>
			<th>Village</th>
			<th>Martial Status</th>
			<th>Main Job</th>
			<th>Side Job</th>
			<th>Education</th>
			<th>Non Formal Education</th>
			<th>Complete Data</th>
			<th>Approve</th>
			<th>Is reparticipated</th>
			<th>Carbon Status</th>
		</tr>
	</thead>
	<tbody>
		<?php if (!empty($data_province)) {
			foreach ($data_province as $dd) { ?>
					<tr>
						<td><?= $dd->farmer_no ?></td>
						<td><?= $dd->nickname ?></td>
						<td><?= $dd->birthday ?></td>
						<td><?= $dd->religion ?></td>
						<td><?= $dd->ethnic ?></td>
						<td><?= $dd->origin ?></td>
						<td><?= $dd->gender ?></td>
						<td><?= $dd->join_date ?></td>
						<td><?= $dd->number_family_member ?></td>
						<td><?= $dd->ktp_no ?></td>
						<td><?= $dd->ktp_document ?></td>
						<td><?= $dd->phone ?></td>
						<td><?= $dd->rt ?> / <?= $dd->rw ?></td>
						<td><?= $dd->address ?></td>
						<td><?= $dd->total_land_owned ?></td>
						<td><?= $dd->legal_land_categories ?></td>
						<td><?= $dd->project_model ?></td>
						<td><?= $dd->village_frm ?></td>
						<td><?= $dd->kecamatan_frm ?></td>
						<td><?= $dd->kabupaten_frm ?></td>
						<td><?= $dd->province_frm ?> ( <?= $dd->post_code ?>)</td>
						<td><?= $dd->mu_no_frm ?></td>
						<td><?= $dd->target_area_frm ?></td>
						<td><?= $dd->group_no ?></td>
						<td><?= $dd->mou_no ?></td>
						<td><?= $dd->main_income ?></td>
						<td><?= $dd->side_income ?></td>
						<td><?= $dd->avg_income_permonth ?></td>
						<td><?= $dd->is_farmer_partner_helping ?></td>
						<td><?= $dd->avg_food_outcome_monthly ?></td>
						<td><?= $dd->avg_farming_income_yearly ?></td>
						<td><?= $dd->avg_wood_bussines_income_yearly ?></td>
						<td><?= $dd->avg_farm_income_yearly ?></td>
						<td><?= $dd->avg_fishery_income_yearly ?></td>
						<td><?= $dd->avg_nature_tourism_yearly ?></td>
						<td><?= $dd->avg_other_source_income_yearly ?></td>
						<td><?= $dd->general_medicine_source ?></td>
						<td><?= $dd->general_food_source ?></td>
						<td><?= $dd->general_drink_water_source ?></td>
						<td><?= $dd->general_clean_water_source ?></td>
						<td><?= ($dd->active == 1) ? 'Yes' : 'No'; ?></td>
						<td><?= $dd->user_id ?></td>
						<td><?= $dd->ff_name ?></td>
						<td><?= $dd->bank_account ?></td>
						<td><?= $dd->bank_branch ?></td>
						<td><?= $dd->bank_name ?></td>
						<td><?= $dd->village_ff ?></td>
						<td><?= $dd->marrital_status ?></td>
						<td><?= $dd->main_job ?></td>
						<td><?= $dd->side_job ?></td>
						<td><?= $dd->education ?></td>
						<td><?= $dd->non_formal_education ?></td>
						<td><?= ($dd->complete_data ==1) ? 'Yes': 'No'; ?></td>
						<td><?= ($dd->approve == 1) ? 'Yes' :'No'; ?></td>
						<td><?= ($dd->is_reparticipated == 0) ? 'No': 'Yes'; ?></td>
						<td><?= $dd->farmer_carbon_status ?></td>
					</tr>
			<?php }
		} ?>
	</tbody>
</table>