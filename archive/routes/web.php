<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/







/*================================

    Top level of our Route Auth

===================================*/


Auth::routes();

Route::group(['middleware'=>'auth'],function(){


    Route::get('/',function(){

        if(Auth::user()->user_level==\App\User::ADMIN)


            return view('layout.home');
        else{

            return redirect('error');

        }

    });

    Route::get('error',function(){

        return "sorry you can not access to this page";

    });

        Route::group(['prefix'=>'user','middleware'=>'admin','namespace'=>'Admin'],function(){
            Route::get('/','UserController@index')->name('user.list');
            Route::match(['get','post'],'create','UserController@create')->name('user.create');
            Route::match(['get','put'],'update/{id}','UserController@update')->name('user.update');
            Route::delete('delete/{id}','UserController@delete')->name('user.delete');

        });

        Route::group(['middleware'=>'admin'],function(){

            Route::group(['prefix'=>'home'],function (){

                Route::get('/','HomeController@index')->name('home.list');
                Route::match(['get','post'],'create','HomeController@create')->name('home.create');
                Route::match(['get','put'],'update/{id}','CountryController@update')->name('home.update');
                Route::delete('delete','HomeController@delete')->name('home.delete');


            });
               /*================================
            ssn routes
           ===================================*/
           Route::group(['prefix' => 'ssn','namespace'=>'Admin'],function(){
            Route::get('/','Ssn_numberController@index')->name('ssn.list');
            Route::match(['get','post'],'create','Ssn_numberController@create')->name('ssn.create');
            Route::delete('delete/{id}','Ssn_numberController@delete')->name('ssn.delete');
            Route::match(['get','put'],'update/{ssn_id}','Ssn_numberController@update')->name('ssn.update');
            Route::match(['get','put'],'report','Ssn_numberController@report')->name('ssn.report');
            Route::get('report/reposne','Ssn_numberController@report_data')->name('ssn.public');
           

 
        });


            // reason_pay routes
            Route::group(['prefix'=>'reason_pay','namespace'=>'Admin'],function(){
                Route::get('/','Reason_paysController@index')->name('reason_pay.list');
                Route::match(['get','post'],'create','Reason_paysController@create')->name('reason_pay.create');
                Route::match(['get','put'],'update/{id}','Reason_paysController@update')->name('reason_pay.update');
                Route::delete('delete/{id}','Reason_paysController@delete')->name('reason_pay.delete');
            });
// expense routes
            Route::group(['prefix'=>'expense','namespace'=>'Admin'],function(){
                Route::get('/','ExpensesController@index')->name('expense.list');
                Route::get('/report','ExpensesController@report')->name('expense.report');
                Route::get('/get_report','ExpensesController@get_report')->name('expense.get_report');
                Route::get('/report_data','ExpensesController@report_data')->name('expense.report_data');
                Route::get('/pdf','ExpensesController@pdf')->name('expense.pdf');
                Route::match(['get','post'],'create','ExpensesController@create')->name('expense.create');
                Route::match(['get','put'],'update/{id}','ExpensesController@update')->name('expense.update');
                Route::delete('delete/{id}','ExpensesController@delete')->name('expense.delete');
            });



            // employee routes
            Route::group(['prefix' => 'employee','namespace'=>'Admin'], function () {
                Route::get('/', 'EmployeesController@index')->name('employee.list');
                Route::match(['get', 'post'], 'create', 'EmployeesController@create')->name('employee.create');
                Route::match(['get', 'put'], 'update/{id}', 'EmployeesController@update')->name('employee.update');
                Route::delete('delete/{id}', 'EmployeesController@delete')->name('employee.delete');
               
               
            });
            Route::group(['prefix' => 'employeereport','namespace'=>'Admin'], function () {
                Route::get('/', 'EmployeeReportsController@index')->name('employeereport.list');
                Route::match(['get', 'post'], 'create', 'EmployeeReportsController@create')->name('employeereport.create');
                Route::match(['get', 'put'], 'update/{id}', 'EmployeeReportsController@update')->name('employeereport.update');
                Route::match(['get', 'put'], 'payment/{id}', 'EmployeeReportsController@payment')->name('employeereport.payment');
                Route::delete('delete/{id}', 'EmployeeReportsController@delete')->name('employeereport.delete');
                Route::get('getSalary/{id}', 'EmployeeReportsController@getSalary')->name('employeereport.getSalary');
                 });


            Route::group(['prefix'=>'position','namespace'=>'Admin'],function(){


                Route::get('/','Employee_positionsContrller@index')->name('position.list');

                Route::match(['get','post'],'create','Employee_positionsContrller@create')->name('position.create');
                Route::match(['get','put'],'update/{id}','Employee_positionsContrller@update')->name('position.update');
                Route::delete('delete/{id}','Employee_positionsContrller@delete')->name('position.delete');


            });
  






        });





});
















