<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService ;
    }

    public function login(LoginRequest $request){

       return $this->userService->login($request->validated());
    }

    public function register(RegisterUserRequest $request){

       $this->userService->register($request->validated());

       return response()->json(["message" => "created"], 201);
    }
}
