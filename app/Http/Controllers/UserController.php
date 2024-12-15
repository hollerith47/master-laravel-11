<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $user = new User();
        $user->name = "Makiese";
        $user->email = "makiese@yandex.ru";
        $user->password = "123456";
        $user->save();

        // working
//        return view("user", ["name" => $user->name, "email" => $user->email]);
        // let try an array
//        return view("", ["user" => $user]);
    }

    function showUsers()
    {
        $users = User::all();
//        echo $users;
//        dd($users);
        return view("users", ["users" => $users]);
    }

    public function updateUser()
    {
        $user = User::where("id", 1)->first();
        $user->email = "herman@gmail.com";
        $user->save();

        echo "name :" . $user->name . "email: " . $user->email . "<br>";
    }

    public function deleteUser()
    {
        // first method
        /*
        $user = User::find(2);
        if (!$user){
            return "User not found";
        }
        $user->delete();
        echo "User deleted";
        */

        // second method
        $user = User::findOrFail(2);
        echo "User deleted";


    }
}
