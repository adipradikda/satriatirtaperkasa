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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'administrator/dashboard';
$route['login'] = 'administrator/auth/login';
$route['login-process'] = 'administrator/auth/login/login_process';
$route['register'] = 'administrator/auth/register';
$route['logout'] = 'administrator/auth/login/logout';
$route['daily_report'] = 'administrator/daily_report';
$route['daily_report-auto/(:any)/(:any)'] = 'administrator/daily_report/generate_otomatis/$1/$2';
$route['daily_report-simpan'] = 'administrator/daily_report/simpan';
$route['daily_report-delete'] = 'administrator/daily_report/delete';
$route['daily_report-edit'] = 'administrator/daily_report/edit';
$route['daily_report-simpan-edit'] = 'administrator/daily_report/simpan_edit';
$route['daily_report-print'] = 'administrator/daily_report/print';
$route['improvment'] = 'administrator/improvment';
$route['improvment-simpan'] = 'administrator/improvment/simpan';
$route['improvment-delete'] = 'administrator/improvment/delete';
$route['improvment-edit'] = 'administrator/improvment/edit';
$route['improvment-simpan-edit'] = 'administrator/improvment/simpan_edit';
$route['improvment-print'] = 'administrator/improvment/print';
$route['charts'] = 'administrator/charts';
$route['chart_flow_inlet_outlet/(:any)/(:any)'] = 'administrator/charts/chart_flow_inlet_outlet/$1/$2';
$route['chart_inlet_outlet/(:any)/(:any)'] = 'administrator/charts/chart_inlet_outlet/$1/$2';
$route['chart_chemical/(:any)/(:any)'] = 'administrator/charts/chart_chemical/$1/$2';
$route['chart_mbbr/(:any)/(:any)'] = 'administrator/charts/chart_mbbr/$1/$2';
$route['chart_hos/(:any)/(:any)'] = 'administrator/charts/chart_hos/$1/$2';
$route['chart_bls/(:any)/(:any)'] = 'administrator/charts/chart_bls/$1/$2';