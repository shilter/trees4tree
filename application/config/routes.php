<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['desa'] = 'home/desa';
$route['kecamatan'] = 'home/kecamatan';
$route['kabupaten'] = 'home/kabupaten';
$route['province'] = 'home/province';
