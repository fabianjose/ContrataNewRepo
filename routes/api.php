<?php

use Illuminate\Http\Request;

Route::post('/login','Auth\LoginController@enter');

Route::post('offers/area/highlight', "OfferController@getHighlightByLocation");

Route::get('/departments','DepartmentController@getAll');
Route::get('/municipalities','MunicipalityController@getAll');

Route::get('/services','ServiceController@getAll');
Route::get('/service/{id}','ServiceController@getService');
Route::get('/service/{id}/fields', "ServiceController@getFields");

Route::get('/municipalities/{departmentName}','MunicipalityController@getByDepartment');

Route::get('/companies/highlighted','CompanyController@getAllHighlighted');
Route::get('offers/highlighted', 'OfferController@getAllHighlighted');

Route::post("/mail/contact", "MailController@sendMail");

Route::get('/offers/search', "OfferController@searchOffers");

Route::group(['middleware' => ['JwtMiddleware']], function () {
  Route::post('/department','DepartmentController@newDepartment');
  Route::delete('/department/{id}','DepartmentController@deleteDepartment');

  Route::post("/municipalities", "MunicipalityController@newMunicipality");
  Route::delete("/municipalities/{id}", "MunicipalityController@remove");

  Route::post('/company','CompanyController@newCompany');
  Route::put('/company/{id}','CompanyController@editCompany');
  Route::put('/company/{name}/highlight','CompanyController@highlightCompany');
  Route::put('/company/{id}/dehighlight','CompanyController@deHighlightCompany');
  Route::get('/companies/notHighlighted','CompanyController@getAllNotHighlighted');
  Route::get('/companies','CompanyController@getAll');
  // Route::get('/company/names','CompanyController@getNames');
  Route::get('/company/{id}','CompanyController@getCompany');
  Route::delete('/company/{id}','CompanyController@deleteCompany');

  Route::post('/service','ServiceController@newService');
  Route::put('/service/{id}','ServiceController@editService');
  Route::delete('/service/{id}','ServiceController@deleteService');

  Route::post('/offer','OfferController@newOffer');
  Route::put('/offer/{id}','OfferController@editOffer');
  Route::get('/offer/{id}','OfferController@getOffer');
  Route::delete('/offer/{id}','OfferController@deleteOffer');
  Route::get('/offers','OfferController@getAll');


  Route::post('offers/area', 'OfferController@getByLocation');
  Route::post('offers/highlight/{id}', "OfferController@HighlightOffer");
  Route::delete('offers/highlight/{id}', "OfferController@deleteHighlightOffer");

  Route::get('config', "ConfigController@getAll");

  Route::post('config', "ConfigController@edit");

});
