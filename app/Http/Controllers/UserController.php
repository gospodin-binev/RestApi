<?php

namespace App\Http\Controllers;

use Response;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $user = null;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUsers()
    {
        return $this->user->getUsers();
    }

    public function createUser()
    {
        return Response::json($this->user->createUser(), 200);
    }

    public function showUser($id)
    {
        $user = $this->user->showUser($id);

        if (!$user) {
            return Response::json(['response' => 'No such user.'], 400);
        }

        return Response::json($user, 200);
    }

    public function updateUser($id)
    {
        $user = $this->user->updateUser($id);

        if (!$user) {
            return Response::json(['response' => 'No such user.'], 400);
        }

        return Response::json($user, 200);
    }

    public function deleteUser($id)
    {
        $user = $this->user->deleteUser($id);

        if (!$user) {
            return Response::json(['response' => 'No such user.'], 400);
        }

        return Response::json(['response' => 'Successfully deleted user.'], 200);
    }
}
