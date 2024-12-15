<?php

use App\Models\User;
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

// page 404
Route::fallback(function (){
    return view("404");
});





