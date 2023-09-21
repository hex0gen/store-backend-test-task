<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{

    public function list()
    {
        return response()->json(User::all());
    }

}
