<?php

use RealRashid\SweetAlert\Facades\Alert;

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
//Front page
Route::group(['middleware' => 'auth'], function () {

Route::get('/','AccountController@dashboard');
//Route::get('/','AccountController@dashboard')->middleware('other');


Route::get('/exam/{id}','MainController@exam');
Route::get('/exam/question/reading','MainController@reading');
Route::get('/exam/question/speaking','MainController@speaking');
Route::get('/exam/question/writting','MainController@exampost');






//Income

Route::get('/admin/create/onlineSale','ReadingController@onlineSale');
Route::post('/admin/save/onlineSale','ReadingController@saveOnlineSales');
Route::get('/admin/create/direct/sell','ReadingController@directSell');
Route::post('/admin/save/direct/sell','ReadingController@directSaleSave');
Route::get('/admin/create/other/create','ReadingController@other');
Route::post('/admin/save/other/income','ReadingController@otherSave');

//Expenses

Route::get('/admin/create/officeCost','ExpenseController@officeCost');
Route::post('/admin/save/officeCost','ExpenseController@officeCostSave');
Route::get('/admin/create/shortPurchase','ExpenseController@shortPurchase');
Route::post('/admin/save/shortPurchase','ExpenseController@shortPurchaseSave');
Route::get('/admin/create/companyPurchase','ExpenseController@companyPurchase');
Route::post('/admin/save/companyPurchase','ExpenseController@companyPurchaseSave');
Route::get('/admin/create/otherExpense','ExpenseController@otherExpense');
Route::post('/admin/save/otherExpense','ExpenseController@otherExpenseSave');

//Account

Route::get('/admin/create/addmoney','AccountController@addMoney');
Route::post('/admin/save/addmoney','AccountController@addMoneySave');
Route::post('/admin/save/widthdraw','AccountController@addWidthdrwSave');
Route::get('/admin/create/widthdraw','AccountController@addWidthdrw');

//Due

Route::get('/admin/index/due','DueController@index')->name('due');
Route::post('/admin/payment/due','DueController@payment');

//Account Payable

Route::get('/admin/add/payable','AccountPayableController@add');
Route::post('/admin/save/payable','AccountPayableController@save');
Route::get('/admin/index/payable','AccountPayableController@index');
Route::post('/admin/payment/payable','AccountPayableController@payment');
Route::get('/admin/payment/all','AccountPayableController@AllPayment');

//report
Route::post('/admin/create/report','AccountController@pdfMaker');
Route::post('/admin/onlineSales/report','AccountController@pdfMakerOnline');
Route::post('/admin/directSales/report','AccountController@pdfMakerDirect');
Route::post('/admin/sortPurchase/report','AccountController@pdfMakerSort');
Route::post('/admin/purchase/report','AccountController@pdfMakerPurchase');
Route::post('/admin/monthly/report','AccountController@monthlyReport');
Route::get('/admin/pdf/report/{date}','AccountController@genratePdf');

//product
Route::get('/admin/product/all','ProductController@index');

//POS
//Route::get('/pos','ProductController@pos');
Route::post('/admin/pos/add/product','ProductController@addProduct');
Route::get('/admin/pos/add/cart','ProductController@cartItem');
Route::post('/admin/pos/delete','ProductController@deleteItem');
Route::post('/admin/pos/add/manual','ProductController@manualProduct');
Route::post('/admin/pos/sell','ProductController@sellProduct');


//Customer
Route::post('/admin/pos/add/customer','ProductController@addCustomer');
Route::post('/admin/pos/customer/autocomplete','ProductController@autocomplete');

Route::get('/Loged_Out','ProductController@logOut');
//Rport home page
Route::get('/report',function(){
	return view('admin.dashboard.report');
});

//All Listing
Route::get('/admin/list/otherIncome','ListController@otherIncome');
Route::post('/admin/list/otherIncome/delete','ListController@otherIncomeDelete');

Route::get('/admin/list/directSell','ListController@directSell');
Route::post('/admin/list/directSell/delete','ListController@directSellDelete');

Route::get('/admin/list/onlineSell','ListController@onlineSell');
Route::post('/admin/list/onlineSell/delete','ListController@onlineSellDelete');


Route::get('/admin/list/shortPurchase','ListController@shortPurchase');
Route::post('/admin/list/shortPurchase/delete','ListController@shortPurchaseDelete');

Route::get('/admin/list/otherExpenses','ListController@otherExpenses');
Route::post('/admin/list/otherExpenses/delete','ListController@otherExpensesDelete');

Route::get('/admin/list/companyPurchase','ListController@companyPurchase');
Route::post('/admin/list/companyPurchase/delete','ListController@companyPurchaseDelete');

Route::get('/admin/list/officeCost','ListController@officeCost');
Route::post('/admin/list/officeCost/delete','ListController@officeCostDelete');


Route::get('/admin/list/addMoney','ListController@addMoney');

});




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//
