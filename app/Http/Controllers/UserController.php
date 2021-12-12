<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function __invoke(User $user) {
        return response()->json(['user'=>$user]);
    }
}
