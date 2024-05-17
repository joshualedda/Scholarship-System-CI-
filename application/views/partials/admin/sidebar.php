<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
    <a class="nav-link<?php echo (current_url() == base_url('admin/dashboard')) ? '' : ' collapsed'; ?>" href="<?=base_url('admin/dashboard') ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>

  
<li class="nav-item">
<a class="nav-link<?php echo (current_url() == base_url('admin/students')) ? '' : ' collapsed'; ?>" href="<?=base_url('admin/students') ?>">
        <i class="bi bi-people-fill"></i>
        <span>Students</span>
    </a>
</li>


  <li class="nav-heading">Pages</li>

  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
	<i class="bi bi-gear-fill"></i><span>System Settings</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	  <li>
		<a href="<?=base_url('admin/scholarships') ?>">
		  <i class="bi bi-circle"></i><span>Scholarships</span>
		</a>
	  </li>
	  
	  <li>
	<a href="<?=base_url('admin/campus') ?>">
		  <i class="bi bi-circle"></i><span>Campus</span>
		</a>
	  </li>


	  <li>
		<a href="charts-apexcharts.html">
		  <i class="bi bi-circle"></i><span>ApexCharts</span>
		</a>
	  </li>
	  <li>
		<a href="charts-echarts.html">
		  <i class="bi bi-circle"></i><span>ECharts</span>
		</a>
	  </li>
	</ul>
  </li>



  <li class="nav-item">
	<a class="nav-link collapsed" href="users-profile.html">
	  <i class="bi bi-person"></i>
	  <span>Profile</span>
	</a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="pages-faq.html">
	  <i class="bi bi-question-circle"></i>
	  <span>F.A.Q</span>
	</a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="pages-contact.html">
	  <i class="bi bi-envelope"></i>
	  <span>Contact</span>
	</a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="pages-register.html">
	  <i class="bi bi-card-list"></i>
	  <span>Register</span>
	</a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="pages-login.html">
	  <i class="bi bi-box-arrow-in-right"></i>
	  <span>Login</span>
	</a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="pages-error-404.html">
	  <i class="bi bi-dash-circle"></i>
	  <span>Error 404</span>
	</a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="pages-blank.html">
	  <i class="bi bi-file-earmark"></i>
	  <span>Blank</span>
	</a>
  </li><!-- End Blank Page Nav -->

</ul>

</aside><!-- End Sidebar-->
