<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function __;
use function config;
use function response;

class SignInController extends Controller
{
    //
    public function __invoke(SignInRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', $request->get('email'))->first();
        if(!$user instanceof User) {
            return response()->json(['message'=> __('auth.user')], 404);
        }

        if(!Hash::check($user->password, $request->get('password'))) {
            return response()->json(['message'=> __('auth.password')], 401);
        }

        $token = $user->createToken(config('app.name'));
        // $token->token->expires = now()->addDay();

        // $token->token->save();

        return response()->json([ 'user' => $user, 'token' => (string) $token->accessToken ]);
    }
}
