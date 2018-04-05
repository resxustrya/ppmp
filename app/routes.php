<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('seed','SeederController@seed');
Route::get('/',function() {
	if (Auth::check())
	{
		switch(Auth::user()->user_priv)
		{
			case "8888" :
				return Redirect::to('supply');
			break;
			case "1" :
				return Redirect::to('ppmp/section');
			break;
			case "0" :
				return Redirect::to('ppmp/section');
			break;
			case "1111" :
				return Redirect::to('ppmp/division');
			break;			
		}
	} else {
		return Redirect::to('login');
	}
});

Route::match(['GET','POST'],'c','SectionController@pin_code');

Route::match(['GET','POST'],'assets','AccountController@code');
Route::get('assets/menu','AccountController@asset_menu');
Route::get('view/division','AdminController@view_divisions');
Route::match(['GET','POST'],'add/division','AdminController@add_division');
Route::match(['GET','POST'],'edit/division','AdminController@edit_division');
Route::get('view/sections','AdminController@view_sections');
Route::match(['GET','POST'],'add/section','AdminController@add_section');
Route::match(['GET','POST'],'edit/section','AdminController@edit_section');
Route::get('remove/section','AdminController@remove_section');
Route::get('view/users','AdminController@view_users');
Route::match(['GET','POST'],'edit/user','AdminController@edit_user');
Route::get('remove/user','AdminController@remove_user');
Route::match(['GET','POST'],'add/user','AdminController@add_user');
Route::get('rexus/search/user','AdminController@search_user');
Route::get('rexus/search/section','AdminController@search_section');
Route::match(['GET','POST'],'register', 'AccountController@register');
Route::match(['GET','POST'],'reset/password','AccountController@reset_pass');


Route::get('home','InventoryController@inventory');
Route::match(['GET','POST'],'login','AccountController@login');
Route::get('logout',function(){
	Session::flush();
	return Redirect::to('login');
});


//SUPPLY CONTROLLERS

//OFFICE SUPPLIES
Route::get('supply','SupplyController@home');
Route::get('office/supplies','SupplyController@all_items');

// PER EMPLOYEE
Route::post('save/table_a','SupplyController@save_table_a');
Route::get('get/table_a','SupplyController@get_table_a');


//PER SECTION

Route::post('save/table_b','SupplyController@save_table_b');
Route::get('get/table_b','SupplyController@get_table_b');

//TRAINING SUPPLIES

Route::post('save/table_c','SupplyController@save_table_c');
Route::get('get/table_c','SupplyController@get_table_c');

//EQUIPMENT CONSUMABLE
Route::post('save/table_d','SupplyController@save_table_d');
Route::get('get/table_d','SupplyController@get_table_d');

//NON-CONSUMABLE PER SECTION

Route::post('save/table_e','SupplyController@save_table_e');
Route::get('get/table_e','SupplyController@get_table_e');

//SEMI-EXPENDABLE EQUIPMENT AND FURNITURE
//PER EMPLOYEE
Route::get('get/table_f','SupplyController@get_table_f');
Route::post('save/table_f','SupplyController@save_table_f');

//PER SECTION DIVISION
Route::post('save/table_g','SupplyController@save_table_g');
Route::get('get/table_g','SupplyController@get_table_g');

//OPEN LIST FORMS

Route::post('supply/save/section/open-list','SupplyController@save_open_list');



//PPMP PLANING ROUTE FOR EACH SECTIONS

Route::get('get/expense','SectionController@get_expenses');


Route::get('ppmp/section','SectionController@form_plan');

Route::get('get/section/table_a','SectionController@get_table_a');
Route::post('save/section/table_a','SectionController@save_table_a');

Route::get('get/section/table_b','SectionController@get_table_b');
Route::post('save/section/table_b','SectionController@save_table_b');

Route::get('get/section/table_c','SectionController@get_table_c');
Route::post('save/section/table_c','SectionController@save_table_c');

Route::get('get/section/table_d','SectionController@get_table_d');
Route::post('save/section/table_d','SectionController@save_table_d');
Route::post('delete/section/table_d','SectionController@delete_table_d');


Route::get('get/section/table_e','SectionController@get_table_e');
Route::post('save/section/table_e','SectionController@save_table_e');

Route::get('get/section/table_f','SectionController@get_table_f');
Route::post('save/section/table_f','SectionController@save_table_f');


Route::get('get/section/table_g','SectionController@get_table_g');
Route::post('save/section/table_g','SectionController@save_table_g');



Route::get('get/section/table_z','SectionController@get_table_z');
Route::post('save/section/table_z','SectionController@save_table_z');

Route::get('get/section/open-list','SectionController@get_open_list');
Route::post('save/section/open-list','SectionController@save_open_list');

Route::post('delete/item/open-list','SectionController@delete_item_open_list');
Route::post('delete/item/table_z','SectionController@delete_table_z');

Route::match(['GET','POST'],'section/current/budget','SectionController@current_budget');
Route::match(['GET','POST'],'section/current/source-fund','SectionController@source_fund');

//PER PROGRAM

Route::post('save/section/program','SectionController@save_program_items');
Route::get('get/section/program','SectionController@get_program_items');
Route::get('delete/program/{id}','SectionController@delete_program');
Route::post('delete/section/program','SectionController@delete_program_item');
//Route::get('openlist/forms','S')

//ROUTES FOR LOCAL HEALTH PROGRMS

Route::match(['GET','POST'],'create/program','SectionController@create_program');
//DIVISION ROUTES

Route::get('ppmp/division','DivisionController@index');
Route::get('get/sections','DivisionController@sections');

Route::get('get/division/table_a','DivisionController@get_table_a');
Route::match(['GET','POST'],'division/source_fund','DivisionController@source_fund');


Route::get('units','SupplyController@units');
Route::get('d/unit','SupplyController@d_unit');
Route::match(['GET','POST'],'n/unit', 'SupplyController@n_unit');
Route::match(['GET','POST'],'e/unit','SupplyController@e_unit');

Route::get('user/section',function(){
	$section = DB::table('section')->where('short','=', Input::get('section'))->first();
	$users = DB::table('users')->where('section','=',$section->id)->get(['username']);
	return $users;
});

Route::get('clear',function(){
	Session::flush();
	return Redirect::to('login');
});

Route::get('add/seed','SeederController@add_seed');

?>