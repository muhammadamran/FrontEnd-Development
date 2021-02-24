<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['d_pok/(:any)'] = 'd_pok/index/$1';
$route['d_sas/(:any)'] = 'd_sas/index/$1';
$route['d_spanint/(:num)'] = 'd_spanint/index/$1';
$route['d_praja/coba/(:any)'] = 'd_praja/coba/$1';
$route['d_sarpras/(:num)'] = 'd_sarpras/index/$1';
$route['d_sarpras/detail/(:num)'] = 'd_sarpras/detail/$1';
$route['d_sarpras/(:num)/(:any)'] = 'd_sarpras/table/$1/$2';
$route['uploads/v_sarpras/(:any)'] = 'uploads/v_sarpras/$1';
$route['kepegawaian/isian_dosen'] = 'kepegawaian/table_dosen';
$route['kepegawaian/dosen/isian_dosen'] = 'kepegawaian/table_belum_serdos';
$route['kepegawaian/dosen/isian_nidn'] = 'kepegawaian/table_belum_nidn';
$route['kepegawaian/isian_pns'] = 'kepegawaian/table_pns';
$route['kepegawaian/isian_thl'] = 'kepegawaian/table_thl';
$route['kemeng'] = 'kemeng/index';
$route['kemeng/matkul'] = 'kemeng/get_matkul';
$route['kemeng/prodi'] = 'kemeng/get_prodi';
$route['d_peringkat/(:any)'] = 'd_peringkat/index/$1';
$route['kemeng/get_sub_category'] = 'kemeng/get_sub_category';
$route['kemeng/honor_table_all'] = 'kemeng/honor_table_all';
$route['absensi/coba/(:any)'] = 'absensi/coba/$1';
$route['kemeng/get_allp'] = 'kemeng/get_allp';
$route['kemeng/matkul'] = 'kemeng/get_matkul';
$route['kemeng/prodi'] = 'kemeng/get_prodi';
$route['kemeng/fakultas'] = 'kemeng/get_fakultas';
$route['kemeng/sks'] = 'kemeng/get_sks';
$route['absensi/users'] = 'absensi/users';
$route['kemeng/honor_table/(:any)'] = 'kemeng/honor_table/$1';

