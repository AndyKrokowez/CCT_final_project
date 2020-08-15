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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

            /***************** website routes *****************/
$route['home']              = 'website/page/index';
$route['contact']           = 'website/page/contact';
$route['register']          = 'website/page/register';
$route['register_cars']     = 'website/page/create_car';
$route['booking']           = 'website/page/booking';
$route['booking_/(:num)']   = 'website/page/insert_booking/$1';
$route['view_booking']      = 'website/page/view_booking';
$route['view_vehicles']     = 'website/page/view_vehicles';
$route['start']             = 'website/page/start';
$route['login']             = 'website/page/login';
$route['logout']            = 'website/page/logout';
$route['staff']             = 'website/page/staff';
$route['history']           = 'website/page/history';
$route['valet']             = 'website/page/valet';
$route['car_parts']         = 'website/page/car_parts';
$route['annual_services']   = 'website/page/annual_services';
$route['major_repair']      = 'website/page/major_repair';
$route['major_service']     = 'website/page/major_service';
$route['fault_repair']      = 'website/page/fault_repair';
$route['nct_check']         = 'website/page/nct_check';
$route['get_advice']        = 'website/page/get_advice';
$route['privacy_policy']    = 'website/page/privacy_policy';
$route['terms_service']     = 'website/page/terms_service';

             /***************** admin routes *****************/
$route['admin']              = 'admin/login';
$route['admin/logout']       = 'admin/login/logout';

$route['admin/start']        = 'admin/start';

$route['admin/users']                   = 'admin/users';
$route['admin/users/create']            = 'admin/users/create';
$route['admin/users/update/(:num)']     = 'admin/users/edit/$1';
$route['admin/users/delete/(:num)']     = 'admin/users/delete/$1';

$route['admin/services']                   = 'admin/services';
$route['admin/services/create']            = 'admin/services/create';
$route['admin/services/update/(:num)']     = 'admin/services/edit/$1';
$route['admin/services/delete/(:num)']     = 'admin/services/delete/$1';

$route['admin/vehicles']                   = 'admin/vehicles';
$route['admin/vehicles/create']            = 'admin/vehicles/create';
$route['admin/vehicles/update/(:num)']     = 'admin/vehicles/edit/$1';
$route['admin/vehicles/delete/(:num)']     = 'admin/vehicles/delete/$1';
$route['admin/vehicles/booking/(:num)']    = 'admin/vehicles/booking/$1';

$route['admin/mechanics']                   = 'admin/mechanics';
$route['admin/mechanics/create']            = 'admin/mechanics/create';
$route['admin/mechanics/update/(:num)']     = 'admin/mechanics/edit/$1';
$route['admin/mechanics/delete/(:num)']     = 'admin/mechanics/delete/$1';

$route['admin/items']                   = 'admin/items';
$route['admin/items/create']            = 'admin/items/create';
$route['admin/items/update/(:num)']     = 'admin/items/edit/$1';
$route['admin/items/delete/(:num)']     = 'admin/items/delete/$1';

$route['admin/booking']                   = 'admin/booking';
$route['admin/booking/create']            = 'admin/booking/create';
$route['admin/booking/update/(:num)']     = 'admin/booking/edit/$1';
$route['admin/booking/delete/(:num)']     = 'admin/booking/delete/$1';
$route['admin/booking/add_item/(:num)']   = 'admin/booking/add_item/$1';
$route['admin/booking/del_item/(:num)']   = 'admin/booking/del_item/$1';
$route['admin/booking/status/(:num)']     = 'admin/booking/status/$1';
$route['admin/booking/invoice/(:num)']    = 'admin/booking/invoice/$1';