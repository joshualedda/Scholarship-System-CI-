<main id="main" class="main">
	<div>
		<div class="pagetitle">
			<h1>Add Student</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
					<li class="breadcrumb-item active">Student</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="d-flex justify-content-end my-2">
		<a href="<?= base_url('admin/students') ?>" class="btn btn-success">Back</a>
	</div>

	<div class="alert alert-success" id="message" style="display: none;">
	</div>

	<div class="card">
		<div class="card-body">


			<form class="row g-3" id="addStudentForm" action="<?=base_url('students/store') ?>" method="POST">
				<h5 class="card-title mx-2">Personal Information</h5>

				<div class="col-md-6">
					<label class="form-label">Student ID<span class="text-red"></span><span
							class="text-danger">*</span></label>
					<div class="input-group">
						<input class="form-control" type="text" required name="student_id" />
					</div>
				</div>

				<div class="col-md-6">
					<label class="form-label">Campus<span class="text-danger">*</span></label>
					<select class="form-select" name="campus_id" required id="campus_id">
						<option selected value="">Choose from below</option>
						<?php foreach ($campus as $camp): ?>
									<option value="<?= $camp['id']?>"><?= $camp['name']?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<hr>

				<div class="col-md-4">
					<label class="form-label">First Name<span class="text-red"></span><span
							class="text-danger">*</span></label>
					<div class="input-group">
						<input class="form-control" type="text" required name="first_name" />
					</div>
				</div>


				<div class="col-md-4">
					<label class="form-label">Middle Name<span class="text-red"></span><span
							class="text-danger">*</span></label>
					<div class="input-group">
						<input class="form-control" type="text" required name="middle_name" />
					</div>
				</div>


				<div class="col-md-4">
					<label class="form-label">Last Name<span class="text-red"></span><span
							class="text-danger">*</span></label>
					<div class="input-group">
						<input class="form-control" type="text" required name="last_name" />
					</div>
				</div>

				<div class="col-md-6">
					<label class="form-label">Gender<span class="text-danger">*</span></label>
					<select class="form-select" name="gender" required>
						<option selected value="">Choose from below</option>
						<option value="0">Male</option>
						<option value="1">Female</option>
					</select>
				</div>

				<div class="col-md-6">
					<label class="form-label">Civil Status<span class="text-danger">*</span></label>
					<select class="form-select" name="civil_status" required>
						<option selected value="">Choose from below</option>
						<option value="0">Single</option>
						<option value="1">Married</option>
					</select>
				</div>

				<div class="col-md-6">
					<label class="form-label">Email<span class="text-red"></span><span
							class="text-danger">*</span></label>
					<div class="input-group">
						<input class="form-control" type="text" required name="email" />
					</div>
				</div>
		


				<div class="col-md-6">
					<label class="form-label">Contact Number</label>
					<div class="input-group">
						<input class="form-control" type="number" name="contact" id="contact" />
					</div>
					<span class="text-xs text-danger" id="alert-exist"></span>

				</div>

				<div class="col-md-4">
				
				<label class="form-label">Province<span class="text-danger">*</span></label>
				<select class="form-select" name="province_id" required id="province_id">
					<option selected value="">Choose from below</option>
					<?php foreach ($provinces as $province): ?>
						<option value="<?= $province['provCode']; ?>"><?= $province['provDesc']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

				<div class="col-md-4">
					<label class="form-label">Municipality<span class="text-danger">*</span></label>
					<select class="form-select" name="municipal_id" required id="municipal_id">
						<option selected value="">Choose from below</option>
						
					</select>
				</div>

				<div class="col-md-4">
					<label class="form-label">Barangay<span class="text-danger">*</span></label>
					<select class="form-select" name="barangay_id" required id="barangay_id">
						<option selected value="">Choose from below</option>
					
					</select>
				</div>



				<h5 class="card-title mx-2">School Information</h5>

				<div class="col-md-6">
					<label class="form-label">Year Level<span class="text-danger">*</span></label>
					<select class="form-select" name="year_level" required>
						<option selected value="">Choose from below</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>


				<div class="col-md-6">
					<label class="form-label">Course<span class="text-danger">*</span></label>
					<select id="course_id" class="form-select" name="course_id" required>
						<option selected value="">Choose from below</option>
					</select>
				</div>



				<h5 class="card-title mx-2">Parent Information</h5>
				<div class="col-md-6">
					<label class="form-label">Father Name<span class="text-red"></span><span
							class="text-danger">*</span></label>
					<div class="input-group">
						<input class="form-control" type="text" required name="father_name" />
					</div>
				</div>

				<div class="col-md-6">
					<label class="form-label">Mother Name<span class="text-red"></span><span
							class="text-danger">*</span></label>
					<div class="input-group">
						<input class="form-control" type="text" required name="mother_name" />
					</div>
				</div>



				<div class="col-12 d-flex justify-content-end align-items-center">
					<button class="btn btn-success mt-2 ml-2" type="submit" name="submit">Add Student</button>
				</div>


			</form>

		</div>
	</div>
	</div>
</main>
<script>
	$(document).ready(function(){
	$('#province_id').change(function(){
		var province_id = $(this).val();
		$.ajax({
			url: "<?php echo base_url('students/getMunicipalities'); ?>", // Fixed PHP echo
			type: "post",
			data: {province_id: province_id},
			success: function(response){
				$('#municipal_id').html(response);
			}
		});
	});

	$('#municipal_id').change(function(){ // Event listener for Municipality dropdown
		var municipal_id = $(this).val();
		$.ajax({
			url: "<?php echo base_url('students/getBarangays'); ?>", // URL to fetch Barangays
			type: "post",
			data: {municipal_id: municipal_id},
			success: function(response){
				$('#barangay_id').html(response);
			}
		});
	});
	// courses
	$('#campus_id').change(function(){
		var campus_id = $(this).val();
		$.ajax({
			url: "<?php echo base_url('students/getCourses'); ?>", // Fixed PHP echo
			type: "post",
			data: {campus_id: campus_id},
			success: function(response){
				$('#course_id').html(response);
			}
		});
	});



});
</script>
