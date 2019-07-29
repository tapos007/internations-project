<?php


namespace App\Services;


use App\Exceptions\AppErrorException;
use App\User;

class RegistrationService
{

    public function register($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $registerUser = User::create($data);
        if($registerUser){
            return $registerUser;
        }
        throw new AppErrorException("something wrong for user registration");

    }

    public function delete($id)
    {
        $user = User::findOrfail($id);
        if($user->delete()){
            return true;
        }
        throw new AppErrorException("something wrong");
    }
}
