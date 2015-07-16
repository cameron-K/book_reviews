<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users";
$route['books/(:num)']="/reviews/direct_show_book/$1";
$route['users/(:num)']="/users/show_user/$1";
$route['books/add']="/reviews/direct_new_review";
$route['books']="/reviews/home";
$route['delete/(:num)']="reviews/delete_review/$1";
$route['404_override'] = '';

//end of routes.php