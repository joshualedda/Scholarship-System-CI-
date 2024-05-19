<main id="main" class="main">
	<div class="pagetitle">
		<h1>Dashboard</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">

			<div class="col-lg-12">
				<div class="row">

					<!-- Sales Card -->
					<div class="col-xxl-4 col-md-6">
						<div class="card info-card sales-card">


							<div class="card-body">
								<h5 class="card-title">Government Scholarships</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-bank2"></i>
									</div>
									<div class="ps-3">
										<h6><?= $totalGovScholar ?></h6>


									</div>
								</div>
							</div>

						</div>
					</div><!-- End Sales Card -->

					<!-- Revenue Card -->
					<div class="col-xxl-4 col-md-6">
						<div class="card info-card revenue-card">


							<div class="card-body">
								<h5 class="card-title">Private Scholarship</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-cash"></i>
									</div>
									<div class="ps-3">
										<h6><?= $totalPrivateScholar ?></h6>

									</div>
								</div>
							</div>

						</div>
					</div><!-- End Revenue Card -->

					<!-- Customers Card -->
					<div class="col-xxl-4 col-xl-12">

						<div class="card info-card customers-card">



							<div class="card-body">
								<h5 class="card-title">Active Government Scholarship</span></h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-currency-exchange"></i>
									</div>
									<div class="ps-3">
										<h6>
											<?= $totalActiveGovScholar ?>
										</h6>

									</div>
								</div>

							</div>
						</div>

					</div>



					<div class="col-xxl-4 col-xl-12">

						<div class="card info-card customers-card">



							<div class="card-body">
								<h5 class="card-title">Active Private Scholarship</span></h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-coin"></i>
									</div>
									<div class="ps-3">
										<h6>
											<?= $totalActivePrivateScholar ?>
										</h6>

									</div>
								</div>

							</div>
						</div>

					</div><!-- End Customers Card -->








					<div class="col-xxl-4 col-xl-12">

						<div class="card info-card customers-card">
							<div class="card-body">
								<h5 class="card-title">Government Grantee</span></h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-person-check"></i>
									</div>
									<div class="ps-3">
										<h6>
											<?= $totalGovernmentStudent ?>
										</h6>

									</div>
								</div>

							</div>
						</div>

					</div>
					<div class="col-xxl-4 col-xl-12">

						<div class="card info-card customers-card">



							<div class="card-body">
								<h5 class="card-title">Private Grantee</span></h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-person-fill-lock"></i>
									</div>
									<div class="ps-3">
										<h6>
											<?= $totalPrivateStudent ?>
										</h6>

									</div>
								</div>

							</div>
						</div>

					</div>







					<!-- Reports -->
					<div class="col-6">
						<div class="card">




							<div class="card-body">
								<h5 class="card-title">Reports <span>/Today</span></h5>


								<div class="row">
									<div class="col-md-3">
										<select class="form-select" name="type1" id="type1" required>
											<option value="">Type</option>
											<option value="0">Private</option>
											<option value="1">Public</option>
										</select>
									</div>
									<div class="col-md-3">
										<select class="form-select" name="scholarship_id1" id="scholarship_id1" required>
											<option value="">Scholarships</option>
										</select>
									</div>
									<div class="col-md-3">
										<select class="form-control" name="school_year" required id="school_year">
											<option selected value="">School Year</option>
											<option value="2023-2024">2024-2025</option>
											<option value="2024-2025">2024-2025</option>
											<option value="2025-2026">2025-2026</option>
											<option value="2026-2027">2026-2027</option>
										</select>
									</div>
								</div>

								<canvas id="barChart" style="max-height: 400px;"></canvas>


							</div>

						</div>
					</div>



				</div>
			</div>



		</div>
		</div>
	</section>
</main>
<script>
    let chartInstance;

    function fetchChartData() {
        var scholarship_id = $('#scholarship_id1').val();
        var school_year = $('#school_year').val();

        $.ajax({
            url: "<?= base_url('Dashboard/getCampusStudentData') ?>",
            method: "GET",
            data: {
                scholarship_id: scholarship_id,
                school_year: school_year
            },
            success: function(data) {
                var response = JSON.parse(data);
                var labels = [];
                var counts = [];

                // Extract labels (campus names) and counts from the response
                response.forEach(function(item) {
                    labels.push(item.campus_name);
                    counts.push(item.student_count);
                });

                if (chartInstance) {
                    chartInstance.destroy();
                }

                chartInstance = new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                        labels: labels, 
                        datasets: [{
                            label: 'Number of Students',
                            data: counts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    }

    $(document).ready(function() {
        $('#scholarship_id1, #school_year').change(fetchChartData);
        fetchChartData(); // Fetch initial data without filters
    });
</script>




<script>
	$(document).ready(function() {
		// Populate scholarship options for the first scholarship type
		$('#type1').change(function() {
			var type1 = $(this).val();
			$.ajax({
				url: "<?php echo base_url('students/getScholars'); ?>",
				type: "post",
				data: {
					type: type1
				},
				success: function(response) {
					$('#scholarship_id1').html(response);
				}
			});
		});


		// Load scholarship options on page load if types are already selected
		if ($('#type1').val() !== "") {
			$('#type1').trigger('change');
		}
	});
</script>
