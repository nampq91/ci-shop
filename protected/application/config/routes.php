<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/index';

$route['(:any)-c(:num)'] = 'home/index/category/$2';
$route['(:any)/(:any)-s(:num)'] = 'home/index/detail/$3';
$route['search'] = 'home/index/search';


$route['robots.txt'] = 'website/robots';
$route['humans.txt'] = 'website/humans';




//Backend Router
$route['admin'] = 'admin/dashboard/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
