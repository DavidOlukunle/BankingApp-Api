<?php
namespace App\Services;
use App\Dtos\UserDto;
use App\Models\User;

class UserService

{
    public function createUser(UserDto $userDto)
    {
       $user = User::query()->create([
            'name' => $userDto->getName(),
            'email' =>$userDto->getEmail(),
            'password' => $userDto->getPassword(),
            'phone_number' => $userDto->getPhoneNumber()

        ]);
        return $user;
    }
}