<?php

namespace App\Http\Controllers;

use App\Dtos\UserDto;
use App\Dtos\FormRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterUserRequest;

class AuthenticationController extends Controller
{
    public $userService;
    use ApiResponseTrait;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterUserRequest $request)
    {
       $userDto = UserDto::fromApiFormRequest($request);
        $user = $this->userService->createUser($userDto);
        return $this->success([
            'user' => $user,
            'message'=>'Registration successful'
        ]);
    //   return response()->json(['user'=>$user, 'success'=>true, 'message'=>'registration successful']);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(!Auth::attempt($credentials))
        {
           return response()->json(message:'invalid credentials');
        }
        $user = $request->user();
        $token = $user->CreateToken('auth-token')->plainTextToken;
        return $this->success([
            'user' => $user,
            'message' => 'login suuccessfull',
            'token' => $token
        ]);


    }

        public function getUser()
        {
            
        }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return $this->success([
            'message'=> 'logged out successfull'
        ]);
    }
}
