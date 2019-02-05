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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'hotelz/hotels';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['apartments'] = "hotelz/apartments";
$route['hotels'] = "hotelz/hotels";
$route['resorts'] = "hotelz/resorts";
$route['homestays'] = "hotelz/home";

$route['hotel-packages'] = "hotelz/yoga";
$route['ayurveda'] = "hotelz/ayurveda";

$route['holiday'] = "hotelz/holiday";





$route['hotels/detail/(:any)'] = "hotel_detail/hotel/$1";
$route['resorts/detail/(:any)'] = "hotel_detail/hotel/$1";
$route['apartments/detail/(:any)'] = "hotel_detail/hotel/$1";
$route['homestays/detail/(:any)'] = "hotel_detail/hotel/$1";

$route['ayurveda/detail/(:any)'] = "hotel_detail/ayurveda/$1";
$route['hotel-packages/detail/(:any)'] = "hotel_detail/ayurveda/$1";


$route['reviews/(:num)'] = "hotel_detail/hotel_review/$1";

$route['holiday/search_list'] = "packages";
$route['resorts/search_list'] = "hotels/search_list";
$route['homestays/search_list'] = "hotels/search_list";
$route['ayurveda/search_list'] = "ayurveda/search_list";
$route['hotel-packages/search_list'] = "ayurveda/search_list";
$route['apartments/search_list'] = "hotels/search_list";

$route['privacy-policy'] = "terms/privacy";
$route['terms-conditions'] = "terms";

$route['register-your-property'] = "about/property";
//$route['homestays/detail/(:num)'] = "packages/detial/$1";


$route['hotels/detail-search'] = "Detail_search/hotels";
$route['ayurveda/detail-search'] = "Detail_search/ayurvedas";

$route['hotels/detail-search'] = "Detail_search/hotels";
$route['resorts/detail-search'] = "Detail_search/hotels";
$route['homestays/detail-search'] = "Detail_search/hotels";
$route['apartments/detail-search'] = "Detail_search/hotels";


$route['hotels/search_det'] = "hotels/search_det";
$route['resorts/search_det'] = "hotels/search_det";
$route['homestays/search_det'] = "hotels/search_det";
$route['apartments/search_det'] = "hotels/search_det";


$route['packages/checkout'] = "packages/checkout";
$route['packages/payment'] = "packages/payment";


$route['yoga/search_det'] = "ayurveda/search_det";
$route['hotel-packages/detail-search'] = "Detail_search/ayurvedas";

