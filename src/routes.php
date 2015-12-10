<?php

use Illuminate\Routing\Router;
use Orchestra\Support\Facades\Foundation;

/*
|--------------------------------------------------------------------------
| Routing
|--------------------------------------------------------------------------
*/

Foundation::group('bluschool/attendance', 'attendance', ['namespace' => 'Bluschool\Attendance\Http\Controllers'], function (Router $router)
{

    $router->get('attendance/create', 'AttendanceController@create');
    $router->get('attendance/admin', 'AttendanceController@index');
    $router->get('attendance/teacherAttendance/{id}', 'AttendanceController@teacherAttendance');
    $router->get('/', 'HomeController@index');

});