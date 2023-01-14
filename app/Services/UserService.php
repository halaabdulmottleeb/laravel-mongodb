<?php 

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService{

    public $userRepository ;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository ;
    }

    public function login($data){
        $user = $this->userRepository->findOneBy(['email' => $data['email']]);

        if($user){

            if (Hash::check($data['password'], $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;

                return response()->json([
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'token' => $token
                ], 200);
            }
        }

       return response()->json(["message" => "Email Or Passowrd Is Incorrect"], 401);
    }

    public function register($data){
        $this->userRepository->create($data);
    }
}