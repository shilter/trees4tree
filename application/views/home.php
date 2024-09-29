<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Ferri Andrianto Susilo</title>
  </head>
  <body>
    <h1>Data Farmers</h1>
	<hr>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="table-tab" data-bs-toggle="tab" data-bs-target="#table" type="button" role="tab" aria-controls="table" aria-selected="true">Table</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="graph-tab" data-bs-toggle="tab" data-bs-target="#graph" type="button" role="tab" aria-controls="graph" aria-selected="false">Graph</button>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
			
			<div class="form-group">
				<label for="desaSelect" class="form-label">Desa</label>
				<select class="form-control" id="desaSelect">
						<option value="">Nama Desa</option>
					<?php foreach($desa as $ds) { ?>
						<option value="<?php echo $ds->kode_desa; ?>"><?php echo $ds->name; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="kecSelect" class="form-label">Kecamatan</label>
					<select class="form-control" id="kecSelect">
						<option value="">Nama Kecamatan</option>
						<?php foreach($kecamatan as $kec) { ?>
						<option value="<?php echo $kec->kode_kecamatan; ?>"><?php echo $kec->name; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="kabSelect" class="form-label">Kabupaten</label>
				<select class="form-control" id="kabSelect">
						<option value="">Nama Kabupaten</option>
					<?php foreach($kabupaten as $kab) { ?>
						<option value="<?php echo $kab->kab_code; ?>"><?php echo $kab->name; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="proSelect" class="form-label">Province</label>
				<select class="form-control" id="proSelect">
						<option value="">Nama Province</option>
					<?php foreach($province as $pr) { ?>
						<option value="<?php echo $pr->province_code; ?>"><?php echo $pr->name; ?></option>
					<?php } ?>
				</select>
			</div>
			<hr>
				<div id="loadView">
				</div>
		</div>
		<div class="tab-pane fade" id="graph" role="tabpanel" aria-labelledby="graph-tab">
			<div id="chartContainer" style="height: 600px; width: 1024px;"></div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
	<script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script></script>
	<script>
		$(document).ready(function() {
			$("#desaSelect").select2();
			$('#desaSelect').change(function(){
				$.ajax({
					url: "<?php echo base_url('desa'); ?>",
					data: { desa: $("#desaSelect").val(), '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' },
					dataType:"html",
					type: "POST",
					cache:false,
					success: function(data){
						$('#loadView').empty().append(data);
						$('#proSelect option:eq(0)').prop('selected',true);
						$('#kabSelect option:eq(0)').prop('selected',true);
						$('#kecSelect option:eq(0)').prop('selected',true);
					}
				});
			});
			$("#proSelect").select2();
			$('#proSelect').change(function(){
				$.ajax({
					url: "<?php echo base_url('province'); ?>",
					data: { province: $("#proSelect").val(), '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' },
					dataType:"html",
					type: "POST",
					cache:false,
					success: function(data){
						$('#loadView').empty().append(data);
						$('#desaSelect option:eq(0)').prop('selected',true);
						$('#kabSelect option:eq(0)').prop('selected',true);
						$('#kecSelect option:eq(0)').prop('selected',true);
					}
				});
			});
			$("#kabSelect").select2();
			$('#kabSelect').change(function(){
				$.ajax({
					url: "<?php echo base_url('kabupaten'); ?>",
					data: { kabupaten: $("#kabSelect").val(), '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' },
					dataType:"html",
					type: "POST",
					cache:false,
					success: function(data){
						$('#loadView').empty().append(data);
						$('#desaSelect option:eq(0)').prop('selected',true);
						$('#proSelect option:eq(0)').prop('selected',true);
						$('#kecSelect option:eq(0)').prop('selected',true);
					}
				});
			});
			$("#kecSelect").select2();
			$('#kecSelect').change(function(){
				$.ajax({
					url: "<?php echo base_url('kecamatan'); ?>",
					data: { kecamatan: $("#kecSelect").val() , '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' },
					dataType:"html",
					type: "POST",
					cache:false,
					success: function(data){
						$('#loadView').empty().append(data);
						$('#desaSelect option:eq(0)').prop('selected',true);
						$('#proSelect option:eq(0)').prop('selected',true);
						$('#kabSelect option:eq(0)').prop('selected',true);
					}
				});
			});


			var options = {
				animationEnabled: true,
				title: {
					text: "Fields Facilitators"
				},
				axisY: {
					title: "Farmers",
					suffix: "Person"
				},
				axisX: {
					title: "Fields Facilitator"
				},
				data: [{
					type: "column",
					yValueFormatString: "#,##0.0#",
					dataPoints: [
							<?php if (!empty($chartFF) ) {
								foreach($chartFF as $cff) { ?>
									{ label: "<?= $cff->user_id ?>", y: <?= $cff->jumlah_farmers ?> },
							<?php }	
							} ?>
					]
				}]
			};

			$("#chartContainer").CanvasJSChart(options);
		});
	</script>
</body>

</html>
