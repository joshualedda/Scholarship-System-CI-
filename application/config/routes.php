<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Admin Dashaboard
$route['admin/dashboard'] = 'Dashboard';

//Students Area
$route['admin/students'] = 'Students';
$route['admin/student/create'] = 'Students/create';
//view
$route['admin/student/view/(:any)'] = 'Students/show/$1';
//edit
$route['admin/student/edit/(:any)'] = 'Students/edit/$1';



//Scholarships Area
$route['admin/scholarships'] = 'Scholarships';
//Create
$route['admin/scholarships/create'] = 'Scholarships/create';
//vierw
$route['admin/scholarship/view/(:any)'] = 'Scholarships/show/$1';
//edit
$route['admin/scholarship/edit/(:any)'] = 'Scholarships/edit/$1';


// Campus Are
$route['admin/campus'] = 'Campus';
//create
$route['admin/campus/create'] = 'Campus/create';
//vierw
$route['admin/campus/view/(:any)'] = 'Campus/show/$1';
//edit
$route['admin/campus/edit/(:any)'] = 'Campus/edit/$1';


//Courses
$route['admin/courses'] = 'Courses';
//create
$route['admin/courses/create'] = 'Courses/create';
//vierw
$route['admin/courses/view/(:any)'] = 'Courses/show/$1';
//edit
$route['admin/courses/edit/(:any)'] = 'Courses/edit/$1';
