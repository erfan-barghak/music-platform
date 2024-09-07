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
|	https://codeigniter.com/userguide3/general/routing.html
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

// مسیرهای اصلی
$route['default_controller'] = 'home';  // صفحه خانه
$route['404_override'] = '';            // صفحه خطای 404
$route['translate_uri_dashes'] = FALSE; // استفاده از خط تیره در URL

// مسیرهای لاگین و خروج
$route['login'] = 'auth/login';          // فرم ورود
$route['login/submit'] = 'auth/submit_login';
$route['logout'] = 'auth/logout';        // خروج از سیستم

// مسیرهای ثبت نام
$route['signup'] = 'signup/index';      // فرم ثبت‌نام
$route['signup/submit'] = 'signup/submit';  // پردازش فرم ثبت‌نام

// مسیرهای داشبورد
$route['dashboard-user'] = 'dashboard/user'; // مسیر درست برای داشبورد کاربر
$route['dashboard-admin'] = 'AdminDashboard/index'; // مسیر داشبورد مدیر

// مسیرهای اسلایدر
$route['slider'] = 'slider/index';              // لیست اسلایدرها
$route['slider/create'] = 'slider/create';      // صفحه ایجاد اسلایدر
$route['slider/edit/(:num)'] = 'slider/edit/$1'; // صفحه ویرایش اسلایدر
$route['slider/delete/(:num)'] = 'slider/delete/$1'; // حذف اسلایدر

// مسیرهای موزیک
$route['featured-music'] = 'music/featured';           // موزیک‌های ویژه
$route['recently-played'] = 'music/recently_played';   // موزیک‌های پخش شده اخیر
$route['newly-added'] = 'music/newly_added';           // موزیک‌های تازه افزوده شده
$route['categories'] = 'music/categories';             // دسته‌بندی‌ها
$route['my-music'] = 'MyMusic/index';

$route['profile/edit'] = 'profile/edit';
$route['profile/update'] = 'profile/update';


$route['user_management'] = 'UserManagement/index';
$route['user_management/create'] = 'UserManagement/create';
$route['user_management/store'] = 'UserManagement/store';
$route['user_management/delete/(:num)'] = 'UserManagement/delete/$1';

// مدیریت موزیک‌ها
$route['music_management'] = 'MusicManagement/index';
$route['music_management/create'] = 'MusicManagement/create';
$route['music_management/store'] = 'MusicManagement/store';
$route['music_management/edit/(:num)'] = 'MusicManagement/edit/$1';
$route['music_management/update/(:num)'] = 'MusicManagement/update/$1';
$route['music_management/delete/(:num)'] = 'MusicManagement/delete/$1';

$route['music-details'] = 'music_details/index'; // تنظیم مسیر به تابع index در کنترلر music_details


// صفحات دسته‌بندی‌ها
$route['categories'] = 'categories/index'; // لیست دسته‌بندی‌ها
$route['categories/create'] = 'categories/create'; // صفحه افزودن دسته‌بندی
$route['categories/edit/(:num)'] = 'categories/edit/$1'; // صفحه ویرایش دسته‌بندی
$route['categories/delete/(:num)'] = 'categories/delete/$1'; // حذف دسته‌بندی
$route['categories/(:num)'] = 'categories/view/$1'; // نمایش جزئیات دسته‌بندی
// مسیر برای نمایش صفحات دسته‌بندی
$route['category/(:num)'] = 'categories/music_list/$1';

$route['music/(:any)'] = 'MusicController/index/$1'; // نمایش موزیک‌ها بر اساس نوع دسته‌بندی


// مدیریت تبلیغات
$route['admin/ads'] = 'AdsController/index';
$route['admin/ads/create'] = 'AdsController/create';
$route['admin/ads/store'] = 'AdsController/store';
$route['admin/ads/edit/(:num)'] = 'AdsController/edit/$1';
$route['admin/ads/update/(:num)'] = 'AdsController/update/$1';
$route['admin/ads/delete/(:num)'] = 'AdsController/delete/$1';


// پروفایل مدیر (ویرایش)
$route['admin_profile'] = 'AdminProfile/index';
$route['admin_profile/update'] = 'AdminProfile/update';
$route['admin_profile/update_profile_picture'] = 'AdminProfile/update_profile_picture';
$route['admin_profile/change_password'] = 'AdminProfile/change_password';
