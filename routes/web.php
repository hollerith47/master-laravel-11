<?php

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
//    return "<h1>Hello World</h1>>";
})->name("welcome");

Route::get("about", function(){
    return view("about");
})->name("about");


Route::get("contact", [\App\Http\Controllers\ContactController::class, 'index'])->name("contact.index");
Route::post("contact", [\App\Http\Controllers\ContactController::class, 'contactSubmit'])->name("contact.submit");

Route::get("create-user", [\App\Http\Controllers\UserController::class, "index"]);
Route::get("get-users", [\App\Http\Controllers\UserController::class, "showUsers"])->name("user.show-users");
Route::get("update-user", [\App\Http\Controllers\UserController::class, "updateUser"]);
Route::get("delete-user", [\App\Http\Controllers\UserController::class, "deleteUser"]);

Route::get("file-upload", [\App\Http\Controllers\FileUploadController::class, 'index'])->name("file.upload");
Route::post("file-upload", [\App\Http\Controllers\FileUploadController::class, 'store'])->name("file.store");

Route::get("send-mail", function (){
    $msg = "Welcome mailtrap";
    $email = "hello@example.com";
    $subject = "testing mailtrap";
   Mail::raw($msg, function ($message) use ($msg, $email, $subject){
       $message->to($email)
       ->subject($subject);
   });
   dd("email sent successfully");
});

// page 404
Route::fallback(function (){
    return view("404");
})->fallback();





