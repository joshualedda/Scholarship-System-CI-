<main id="main" class="main">

  <div class="pagetitle">
    <h1>Grantees</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item">Grantees</li>
      </ol>
    </nav>
  </div>


  <div class="d-flex justify-content-end my-2">
    <a href="importStudent.php" class="btn btn-success">Import</a>
    <a href="<?=base_url('admin/student/create') ?>" class="btn btn-success mx-2">Add</a>

  </div>


  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

          
            <h5 class="card-title">Grantees Data</h5>

            <div class="table-responsive">

             <table class="table datatable table-striped table-hover" id="filteredStudentTable">
              <thead>
                <tr>
       
                  <th>Student ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Course</th>
                  <th>Campus</th>
                  <th>Status</th>
                  <th>Manage</th>
                </tr>
              </thead>
						
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

</tbody>



            </table>
            </div>


          </div>
        </div>
      </div>
    </div>
  </section>
</main>
