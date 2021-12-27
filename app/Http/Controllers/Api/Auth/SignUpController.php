<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function __invoke(SignUpRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = User::create([
            'email' => $request->get('email'),
            'hashtag' => $request->get('hashtag'),
            'avatar' => $request->get('avatar'),
            'password' => Hash::make($request->get('password')),
            'surname' => $request->get('surname'),
            'name' => $request->get('name'),
            'birthday' => Carbon::parse($request->get('birthday')),
            'gender' => $request->get('gender')
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalName();
            $file->storeAs('avatars/', $user->id $filename);
            $user->update([
                'avatar' => $filename,
            ]);
        }

        $user->setDeeplinks(is_array($request->get('deeplinks'))
            ? $request->get('deeplinks')
            : json_decode($request->get('deeplinks')));

        $token = $user->createToken(config('app.name'));
        // Нужно придумать как реализовать рефреш токен
        // $token->token->expires = now()->addDay();

        // $token->token->save();

        return response()->json([ 'user' => $user, 'token' => (string) $token->accessToken ]);
    }
}
