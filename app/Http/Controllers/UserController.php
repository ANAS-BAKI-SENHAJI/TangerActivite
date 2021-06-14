<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
        {
            return response()->json(User::with(['reservations'])->get());
        }

        public function login(Request $request)
        {   
            $status = 401;
            $response = ['error' => 'Unauthorised'];

            if (Auth::attempt($request->only(['email', 'password']))) {
                $status = 200;
                $response = [
                    'user' => Auth::user(),
                    'token' => Auth::user()->createToken('activityStore')->accessToken,
                ];
            }

            return response()->json($response, $status);
        }

        public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'c_password' => 'required|same:password',
                'phone' => 'required',
                'city' => 'required',
                'country' => 'required',
                'age' => 'required | gt:17',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $data = $request->only(['name', 'email', 'password', 'phone', 'city', 'country', 'age']);
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);
            $user->is_admin = 0;

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('activityStore')->accessToken,
            ]);
        }

        public function show(User $user)
        {
            return response()->json($user);
        }

        public function showReservations(User $user)
        {
            return response()->json($user->reservations()->with(['activity'])->get());
        }
}
