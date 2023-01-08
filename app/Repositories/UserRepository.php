<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function getAll()
    {
        return User::all();
    }
    public function getUserWithPaginator($quantity, $key = '')
    {
        $data = User::where('username', 'like', '%' . $key . '%')->paginate($quantity);
        // ->get()->toQuery()->paginate($quantity);
        return $data;
    }
    public function deleteUser($userId)
    {
        $user_id = User::findOrFail($userId);
        return $user_id->delete();
    }
    public function getCountUser()
    {
        $data = User::count();
        return $data;
    }
}
