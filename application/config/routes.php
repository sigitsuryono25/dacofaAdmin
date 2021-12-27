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

//fishery
$route['fishery-activity'] = 'Fisheryactivity/index';
$route['fishery-activity/detail/(:any)'] = 'Fisheryactivity/hasilTangkapan/$1';
$route['fishery-activity/form-add'] = 'Fisheryactivity/add';
$route['fishery-activity/action-insert'] = 'Fisheryactivity/addFisheryActivity';
$route['fishery-activity/action-delete/(:any)'] = 'Fisheryactivity/deleteActivity/$1';

//user
$route['user/user-list'] = "User/daftaruser";
$route['user/form-add'] = "User/add";
$route['user/action-insert'] = "User/addUser";
$route['user/form-edit'] = "User/formEditUser";
$route['user/action-update'] = "User/updateUser";
$route['user/action-delete'] = "User/deleteUser";
$route['user/action-search'] = "User/cariUser";


//Fishinggear
$route['fishing-gear/list'] = "Fishinggear/daftarFishinggear";
$route['fishing-gear/form-add'] = "Fishinggear/add";
$route['fishing-gear/action-insert'] = "Fishinggear/addFishinggear";
$route['fishing-gear/form-edit'] = "Fishinggear/formEditFishinggear";
$route['fishing-gear/action-update'] = "Fishinggear/updateFishinggear";
$route['fishing-gear/action-delete'] = "Fishinggear/deleteFishinggear";

//country
$route['country/list'] = "Country/daftarCountry";
$route['country/form-add'] = "Country/add";
$route['country/action-insert'] = "Country/addCountry";
$route['country/form-edit'] = "Country/formEditCountry";
$route['country/action-update'] = "Country/updateCountry";
$route['country/action-delete'] = "Country/deleteCountry";
$route['country/action-search'] = "Country/cariNegara";
$route['country/action-search-currencies'] = "Country/cariMataUang";

//fish
$route['fish/list'] = "Fish/daftarFish";
$route['fish/form-add'] = "Fish/add";
$route['fish/action-insert'] = "Fish/addFish";
$route['fish/form-edit'] = "Fish/formEditFish";
$route['fish/action-update'] = "Fish/updateFish";
$route['fish/action-delete'] = "Fish/deleteFish";
$route['fish/action-search'] = "Fish/cariIkan";


//province
$route['province/list'] = "Province/daftarProvince";
$route['province/form-add'] = "Province/add";
$route['province/action-insert'] = "Province/addProvince";
$route['province/form-edit'] = "Province/formEditProvince";
$route['province/action-update'] = "Province/updateProvince";
$route['province/action-delete'] = "Province/deleteProvince";
$route['province/action-search'] = "Province/cariProvinsi";

//district
$route['district/list'] = "District/daftarDistrict";
$route['district/form-add'] = "District/add";
$route['district/action-insert'] = "District/addDistrict";
$route['district/form-edit'] = "District/formEditDistrict";
$route['district/action-update'] = "District/updateDistrict";
$route['district/action-delete'] = "District/deleteDistrict";
$route['district/action-search'] = "District/cariKabupaten";

//report
$route['report/generate'] = "Report/index";
$route['report/show-report'] = "Report/showReport";
