<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use function response;

class UserController extends Controller
{
    public function __invoke(User $user): \Illuminate\Http\JsonResponse
    {
        return response()->json(['user'=>$user]);
    }
}
