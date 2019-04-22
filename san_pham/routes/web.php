<?php

Route::get('/',['as'=>'san_pham','uses'=>'san_phamController@index']);
Route::get('/insert','san_phamController@insert');
Route::post('/save',['as'=>'save','uses'=> 'san_phamController@save']);
Route::get('/edit/{id}','san_phamController@edit');
Route::post('/save_edit',['as'=>'save_edit','uses'=>'san_phamController@save_edit']);
Route::get('/delete/{id}','san_phamController@delete');
Route::get('/search',['as'=>'search','uses'=>'san_phamController@search']);

