<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterSenderController;
use App\Http\Controllers\NewsletterRecipientsGroupController;
use App\Http\Controllers\NewsletterRecipientController;


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

Route::name('sas.app.webhook.')->middleware(['sas.app.auth'])->group(function () {
   Route::post('/hooks/order/placed', [OrderController::class, 'orderPlacedEvent']);
   Route::get('/iframe/orderlist', [OrderController::class, 'iframeOrderList']);
   Route::post('/actionbutton/add/orderlist', [OrderController::class, 'addOrderListToExistingOrder']);

  

});


 

Route::get('/newslettergetdata',[NewsletterController::class,'newsletter_getdata']);
Route::get('/newslettermanager',[NewsletterController::class,'neswsletter_manager'])->name('newslettermanager');

 Route::get('sender-datatable', [NewsletterSenderController::class, 'index']);
Route::post('store-sender', [NewsletterSenderController::class, 'store']);
Route::post('edit-sender', [NewsletterSenderController::class, 'edit']);
Route::post('delete-sender', [NewsletterSenderController::class, 'destroy']);
//Route::post('delete-all-sender', [NewsletterSenderController::class, 'destroyMultiple']);



Route::get('recipientgroup-datatable', [NewsletterRecipientsGroupController::class, 'index']);
Route::post('store-recipientgroup', [NewsletterRecipientsGroupController::class, 'store']);
Route::post('edit-recipientgroup', [NewsletterRecipientsGroupController::class, 'edit']);
Route::post('delete-recipientgroup', [NewsletterRecipientsGroupController::class, 'destroy']);
Route::get('recipientgroup-datatable', [NewsletterRecipientsGroupController::class, 'index']);
//Route::post('delete-all-recipientgroup', [NewsletterRecipientsGroupController::class, 'destroyMultiple']);


Route::get('recipient-datatable', [NewsletterRecipientController::class, 'index']);
Route::post('store-recipient', [NewsletterRecipientController::class, 'store']);
Route::post('edit-recipient', [NewsletterRecipientController::class, 'edit']);
Route::post('delete-recipient', [NewsletterRecipientController::class, 'destroy']);
//Route::post('delete-all-recipientgroup', [NewsletterRecipientsGroupController::class, 'destroyMultiple']);




  
   //Route::get('/newslettersender',[NewsletterSenderController::class,'index']);
   //Route::get('newslettersender/create',[NewsletterSenderController::class,'create'])->name('newslettersender.create');
   
  /* Route::post('newslettersender/store',[NewsletterSenderController::class,'store']);
   
   Route::get('newslettersender/edit/{id}',[NewsletterSenderController::class,'edit'])->name('newslettersender.edit');
   Route::post('newslettersender/update/{id}',[NewsletterSenderController::class,'update'])->name('newslettersender.update');
   Route::delete('newslettersender/delete/{id}',[NewsletterSenderController::class,'destroy'])->name('newslettersender.delete');
   Route::delete('newslettersender/multidelete',[NewsletterSenderController::class,'deleteMultiSender'])->name('newslettersender.multidelete'); */





/*
 Route::post('reciptientgroup/store',[NewsletterRecipientsGroupController::class,'store']);
   
   Route::get('reciptientgroup/edit/{id}',[NewsletterRecipientsGroupController::class,'edit'])->name('reciptientgroup.edit');
   Route::post('reciptientgroup/update/{id}',[NewsletterRecipientsGroupController::class,'update'])->name('reciptientgroup.update');
   Route::delete('reciptientgroup/delete/{id}',[NewsletterRecipientsGroupController::class,'destroy'])->name('reciptientgroup.delete');
   Route::delete('reciptientgroup/multidelete',[NewsletterRecipientsGroupController::class,'deleteMultiReciptientgroup'])->name('reciptientgroup.multidelete'); */