<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendSms;
use App\Http\Controllers\MapController;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\TechnicienController;



Route::middleware('guest')->group(function(){
    Route::get('/',[LoginController::class,'show'])->name('login.show');
    Route::post('/',[LoginController::class,'login'])->name('login');
});


Route::get('/logout',[LoginController::class,'logout'])->name('login.logout')->middleware('auth');
Route::resource('clients',ClientController::class);

Route::get('/users/commercials', [UserController::class, 'indexCommercial'])->name('users.commercials');
Route::get('/users/techniciens', [UserController::class, 'indexTechnicien'])->name('users.techniciens');


Route::resource('users',UserController::class);

Route::get('/home',function(){
    return view('home');
})->name('home');

Route::get('/intervention',[InterventionController::class, 'index'])->name('intervention');


// Add this to your routes file
Route::get('/technician/response/{client_id}/{response}', [TechnicienController::class, 'handleResponse'])->name('technician.response');
Route::post('/technician/reject/{client}', [TechnicienController::class, 'rejectClient'])->name('technician.decline');



// Route::put('/clients/{id}/update-intervention', [ClientController::class, 'updateIntervention'])->name('clients.updateIntervention');
Route::put('/clients/{id}/update-intervention', [ClientController::class, 'updateIntervention'])->name('clients.updateIntervention');

Route::get('/intervention/en_cour', [InterventionController::class, 'index'])->name('intervention.en_cour');
Route::get('/intervention/non_confirmer', [InterventionController::class, 'index'])->name('intervention.non_confirmer');
Route::get('/intervention/terminer', [InterventionController::class, 'index'])->name('intervention.terminer');


// Route::get('/test-email', function() {
//     Mail::raw('Test email', function($message) {
//         $message->to('hzayna17@gmail.com')->subject('Test');
//     });
//     return 'Email sent';
// });


Route::get('/send-sms', [SendSms::class, 'send'])->name('sms.send');


// Route::get('/testmail', function(){
//     $name="funny coder";
//     Mail::to('hzayna17@gmail.com')->send(new MyMail($name));
//     return 'Email sent';
// })->name('email');


Route::get('/localisation', [App\Http\Controllers\MapController::class, 'index'])->name('localisation');


Route::get('/technician/accept/{client_id}', [TechnicianController::class, 'accept'])->name('technician.accept');
Route::get('/technician/decline/{client_id}', [TechnicianController::class, 'decline'])->name('technician.decline');


Route::get('/technician/response/{client_id}/{response}', [TechnicienController::class, 'handleResponse'])->name('technician.response');

