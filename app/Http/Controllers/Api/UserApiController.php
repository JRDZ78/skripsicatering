<?php

namespace App\Http\Controllers\Api;

use Validator;
use Hash;
use App\User;
use App\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{
    public function login(Request $request)
    {

        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
            return response()->json(['message' => 'Unauthorized'], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'phone' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'address' => 'required|min:10'
        ]);
        $user = new User;
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = UserRole::find(3)->id;
        $user->phone = $request->phone;
        $user->date_of_birth = $request->date_of_birth;
        $user->address = $request->address;
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'address' => 'required|min:10'
        ]);


        $user = User::find($request->id);
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return response()->json([
            'message' => 'Your Profile Updated!'
        ]);

    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed'
        ]);

        $user = User::find($request->id);
        if ($request->old_password === $user->password) {
            $user->password = $request->password;
            return response()->json([
                'message' => 'Password Successfully Changed!'
            ]);
        }

        return response()->json([
                'message' => 'Invalid Password!'
            ]);
    }
}
