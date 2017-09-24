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
$route['default_controller'] = 'ShowQuiz_Controller/index';
$route[''] = 'ShowQuiz_Controller/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
 *  ShowQuiz methods
 */
$route['view/(:any)'] = 'ShowQuiz_Controller/view/$1';
$route['result'] = 'ShowQuiz_Controller/result';


/*
 * Dashboard methods
 */
$route['dashboard'] = 'Dashboard_Controller/index';
$route['admin'] = 'User_Controller/index';
$route['auth'] = 'User_Controller/auth';
$route['logout'] = 'User_Controller/logout';

/*
 * Quizzes methods
 * */
$route['quizzes'] = 'Quizzes_Controller/index';
$route['quizzes/read'] = 'Quizzes_Controller/fetch_quizzes';
$route['quizzes/create'] = 'Quizzes_Controller/create';
$route['quizzes/search'] = 'Quizzes_Controller/search_quizzes';
$route['quizzes/save'] = 'Quizzes_Controller/save';
/*
 * Results methods
 * */
$route['results'] = 'Results_Controller/index';
$route['results/read'] = 'Results_Controller/fetch_results';
$route['results/create'] = 'Results_Controller/create';
$route['results/search'] = 'Results_Controller/search_results';
$route['results/save'] = 'Results_Controller/save';

/*
 * Questions methods
 * */
$route['questions'] = 'Questions_Controller/index';
$route['questions/read'] = 'Questions_Controller/fetch_questions';
$route['questions/create'] = 'Questions_Controller/create';
$route['questions/search'] = 'Questions_Controller/search_questions';
$route['questions/save'] = 'Questions_Controller/save';
/*
 * Options methods
 * */
$route['options'] = 'Options_Controller/index';
$route['options/read'] = 'Options_Controller/fetch_options';
$route['options/create'] = 'Options_Controller/create';
$route['options/search'] = 'Options_Controller/search_options';
$route['options/save'] = 'Options_Controller/save';

