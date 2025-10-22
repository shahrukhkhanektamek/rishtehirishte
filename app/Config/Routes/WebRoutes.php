<?php 



$routes->add('(.*)', 'Home::all/$1');
// $routes->add('user/(:any)', 'Home::all/$1');
$routes->get('for-testing', 'Test::index');

$routes->get('users', 'DataSet::users');
$routes->get('educations', 'DataSet::educations');
$routes->get('set_language', 'DataSet::set_language');
$routes->get('set_user_packages', 'DataSet::set_user_packages');
$routes->get('set_featured_profile', 'DataSet::set_featured_profile');
$routes->get('set_service', 'DataSet::set_service');


$routes->post('bike-modal', 'Home::bike_modal');



$routes->post('search-vendor', 'Home::search_vendor');
$routes->post('search-partner', 'Home::search_partner');
$routes->post('search-user', 'Home::search_user');
$routes->post('search-employee', 'Home::search_employee');
$routes->post('search-country', 'Home::search_country');
$routes->post('search-state', 'Home::search_state');
$routes->post('search-city', 'Home::search_city');
$routes->post('education-category', 'Home::education_category');
$routes->post('search-education', 'Home::search_education');
$routes->post('religion', 'Home::search_religion');
$routes->post('caste', 'Home::search_caste');
$routes->post('languages', 'Home::search_languages');
$routes->post('occupation', 'Home::search_occupation');


$routes->post('contact-enquiry', 'Enquiry::contact_enquiry');
$routes->post('lead-enquiry', 'Enquiry::lead_enquiry');




