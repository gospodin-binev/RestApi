<?php

namespace App;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $hidden = ['password'];

    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    public function getUsers()
    {
        return User::all();
    }

    public function createUser()
    {
        $input = Input::all();

        $input['password'] = Hash::make($input['password']);
        $user = new User();
        $user->fill($input);
        $user->save();
        return $user;
    }

    public function showUser($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return false;
        }

        return $user;
    }

    public function updateUser($id)
    {
        $user = User::find($id);

        if (is_null($user))
        {
            return false;
        }

        $input = Input::all();

        if (isset($input['password']))
        {
            $input['password'] = Hash::make($input['password']);
        }

        $user->fill($input);
        $user->save();
        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return false;
        }

        return $user->delete();
    }
}
