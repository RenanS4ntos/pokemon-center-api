<?php

namespace App\Services;

use App\Repositories\TrainerRepository;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    private $trainerRepository;

    public function __construct(TrainerRepository $trainerRepository)
    {
        $this->trainerRepository = $trainerRepository;
    }

    public function storeUser($data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->trainerRepository->store($data);
        $token = JWTAuth::fromUser($user);
        return $token;
    }

    public function login($data)
    {
        $token = JWTAuth::attempt($data);
        return $token;
    }

}
