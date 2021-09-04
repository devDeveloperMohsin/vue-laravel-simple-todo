<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

  public function __construct(){
    return $this->middleware('auth:sanctum')->except('login','register');
  }

  public function login(Request $request){
    $validData = $request->validate([
      'email' => ['required','email','max:191'],
      'password' => ['required','string','min:8'],
    ]);

    $user = User::where('email',$request->email)->firstOrFail();

    if (Hash::check($request->password, $user->password)) {
      $token = $user->createToken('website_user');
      

      return response()->json([
        'response' => 'success',
        'token' => $token->plainTextToken,
      ]);
    }

    return response()->json([
      'response' => 'error',
      'message' => 'unauthenticated'
    ],401);
  }

  public function register(Request $request){
    $validData = $request->validate([
      'name' => ['required','string','max:191'],
      'email' => ['required','email','string','max:191'],
      'password' => ['required','string','min:8'],
    ]);

    $validData['password'] = Hash::make($request->password);
    User::create($validData);

    return response()->json([
      'response' => 'success',
      'message' => 'User Registered'
    ],200);
  }

  public function logout(){
    Auth::user()->currentAccessToken()->delete();

    return response()->json([
        'response' => 'success',
    ]);
  }
}
