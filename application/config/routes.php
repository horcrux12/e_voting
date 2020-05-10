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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Dashboard
$route['dashboard'] = 'dashboard/dashboard/index';
$route['detail-kegiatan'] = 'dashboard/dashboard/detail';

$route['menu-user'] = 'menu_user/user/table';
$route['menu-user/tambah'] = 'menu_user/user/tambah';
$route['menu-user/ambil'] = 'menu_user/user/interval';
$route['menu-user/simpan'] = 'menu_user/user/simpan';

// Login Admin
$route['login'] = 'login/login/index';
$route['logout'] = 'login/login/logout';
$route['login/super-admin'] = 'login/login/login_super';
$route['login/admin-tps'] = 'login/login/login_tps';
$route['login/bilik'] = 'login/login/login_bilik';
$route['login/auth'] = 'login/login/auth_super';

// Kegiatan
$route['kegiatan'] = 'kegiatan/kegiatan/table';
$route['kegiatan/tambah-kegiatan'] = 'kegiatan/kegiatan/tambah';
$route['kegiatan/edit-kegiatan/(:num)'] = 'kegiatan/kegiatan/edit/$1';
$route['kegiatan/update'] = 'kegiatan/kegiatan/update';
$route['kegiatan/store'] = 'kegiatan/kegiatan/store';
$route['kegiatan/hapus-kegiatan/(:num)'] = 'kegiatan/kegiatan/drop/$1';
$route['kegiatan/server-side'] = 'kegiatan/kegiatan/serverSide';
$route['kegiatan/check-tps'] = 'kegiatan/kegiatan/checkTPS';

// TPS
$route['tps'] = 'tps/tps/table';
$route['tps/tambah-tps'] = 'tps/tps/tambah';
$route['tps/edit-tps/(:num)'] = 'tps/tps/edit/$1';
$route['tps/update'] = 'tps/tps/update';
$route['tps/store'] = 'tps/tps/store';
$route['tps/hapus-tps/(:num)'] = 'tps/tps/drop/$1';
$route['tps/server-side'] = 'tps/tps/serverSide';
$route['tps/check-user/(:num)'] = 'tps/tps/checkTPS/$1';
$route['tps/check-no/(:num)'] = 'tps/tps/checknoTPS/$1';

// Kandidat
$route['kandidat'] = 'kandidat/kandidat/table';
$route['kandidat/tambah-kandidat'] = 'kandidat/kandidat/tambah';
$route['kandidat/edit-kandidat/(:num)'] = 'kandidat/kandidat/edit/$1';
$route['kandidat/update'] = 'kandidat/kandidat/update';
$route['kandidat/store'] = 'kandidat/kandidat/store';
$route['kandidat/hapus-kandidat/(:num)'] = 'kandidat/kandidat/drop/$1';
$route['kandidat/server-side'] = 'kandidat/kandidat/serverSide';
$route['kandidat/check-no/(:num)'] = 'kandidat/kandidat/checknokandidat/$1';

// Bilik
$route['bilik'] = 'bilik/bilik/table';
$route['bilik/tambah-bilik'] = 'bilik/bilik/tambah';
$route['bilik/edit-bilik/(:num)'] = 'bilik/bilik/edit/$1';
$route['bilik/update'] = 'bilik/bilik/update';
$route['bilik/store'] = 'bilik/bilik/store';
$route['bilik/hapus-bilik/(:num)'] = 'bilik/bilik/drop/$1';
$route['bilik/server-side'] = 'bilik/bilik/serverSide';
$route['bilik/getbilik/(:num)'] = 'bilik/bilik/get_bilik/$1';
$route['bilik/check-user/(:num)'] = 'bilik/bilik/checkbilik/$1';
$route['bilik/check-no/(:num)'] = 'bilik/bilik/checknobilik/$1';

// Panitia
$route['panitia'] = 'panitia/panitia/table';
$route['panitia/edit-panitia/(:num)'] = 'panitia/panitia/edit/$1';
$route['panitia/update'] = 'panitia/panitia/update';
$route['panitia/server-side'] = 'panitia/panitia/serverSide';
$route['panitia/gettps/(:num)'] = 'panitia/panitia/getTPS/$1';

// Pemilih Umum
$route['pemilih_umum'] = 'pemilih_umum/pemilih_umum/table';
$route['pemilih_umum/tambah-pemilih_umum'] = 'pemilih_umum/pemilih_umum/tambah';
$route['pemilih_umum/edit-pemilih_umum/(:num)'] = 'pemilih_umum/pemilih_umum/edit/$1';
$route['pemilih_umum/update'] = 'pemilih_umum/pemilih_umum/update';
$route['pemilih_umum/store'] = 'pemilih_umum/pemilih_umum/store';
$route['pemilih_umum/hapus-pemilih_umum/(:num)'] = 'pemilih_umum/pemilih_umum/drop/$1';
$route['pemilih_umum/server-side'] = 'pemilih_umum/pemilih_umum/serverSide';
$route['pemilih_umum/getpemilih_umum/(:num)'] = 'pemilih_umum/pemilih_umum/get_pemilih_umum/$1';
$route['pemilih_umum/check-user'] = 'pemilih_umum/pemilih_umum/check_pemilih_umum';


// Pemilih Pelajar
$route['pemilih_pelajar'] = 'pemilih_pelajar/pemilih_pelajar/table';
$route['pemilih_pelajar/tambah-pemilih_pelajar'] = 'pemilih_pelajar/pemilih_pelajar/tambah';
$route['pemilih_pelajar/edit-pemilih_pelajar/(:any)'] = 'pemilih_pelajar/pemilih_pelajar/edit/$1';
$route['pemilih_pelajar/update'] = 'pemilih_pelajar/pemilih_pelajar/update';
$route['pemilih_pelajar/store'] = 'pemilih_pelajar/pemilih_pelajar/store';
$route['pemilih_pelajar/hapus-pemilih_pelajar/(:any)'] = 'pemilih_pelajar/pemilih_pelajar/drop/$1';
$route['pemilih_pelajar/server-side'] = 'pemilih_pelajar/pemilih_pelajar/serverSide';
$route['pemilih_pelajar/getpemilih_pelajar/(:any)'] = 'pemilih_pelajar/pemilih_pelajar/get_pemilih_pelajar/$1';
$route['pemilih_pelajar/check-user'] = 'pemilih_pelajar/pemilih_pelajar/check_pemilih_pelajar';