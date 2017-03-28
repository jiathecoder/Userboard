<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['404_override'] = '';
$route['default_controller'] = "/boards";

//routes for login/registration
$route['login'] = '/users/login';
$route['register'] = '/users/register';
$route['login_process']='/users/loginProcess';
$route['register_process'] = '/users/create';

//routes for dashboard
$route['dashboard'] = '/boards/dashboard';
$route['users_edit']='/boards/users_edit';
$route['user_edit_information']='/boards/user_edit_information';
$route['user_edit_password'] = '/boards/user_edit_password';
$route['user_edit_description']='/boards/user_edit_description';
$route['admin'] = '/boards/dashboard_admin';
$route['new'] = '/boards/add_new';
$route['show/(:any)'] = '/boards/show/$1';
$route['edit/(:any)'] = '/boards/admin_edit/$1';
$route['delete/(:any)'] = '/boards/remove/$1';
$route['admin_edit/(:any)'] = '/boards/admin_edit/$1';
$route['admin_edit_information/(:any)']='/boards/admin_edit_information/$1';
$route['admin_edit_password/(:any)'] = '/boards/admin_edit_password/$1';
$route['post_message/(:any)'] = '/boards/post/$1';
$route['post_comment/(:any)'] = '/boards/comment/$1';
$route['logoff'] = '/boards/destroy';