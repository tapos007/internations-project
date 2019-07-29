<?php


namespace App\Services;


use App\Exceptions\AppErrorException;
use App\User;
use Spatie\Permission\Models\Role;

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

    public function addGroup(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|exists:roles,name'
        ]);

        $user = User::findOrFail($id);

        if($user->hasRole($request->role_name)){
            throw new AppErrorException("you are already in this group");
        }
        $user->assignRole($request->role_name);



    }

    public function deleteGroup(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|exists:roles,name'
        ]);

        $user = User::findOrFail($id);
        if(!$user->hasRole($request->role_name)){
            throw new AppErrorException("you are not in this group");
        }
        $user->removeRole($request->role_name);
    }
}
