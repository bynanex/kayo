<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Displays a user profile page.
     *
     * @return void
     */
    public function profile(User $user)
    {
    	return view('user.profile', ['user' => $user]);
    }
}
