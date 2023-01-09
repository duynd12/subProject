<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
    public function getAll()
    {
        return User::onlyTrashed()->get();
    }
    public function getUserWithPaginator($quantity, $key = '')
    {
        $data = DB::table('users')->where([
            ['username', 'like', '%' . $key . '%'],
        ])->paginate($quantity);

        return $data;
    }
    public function deleteUser($userId)
    {
        $user_id = User::findOrFail($userId);
        return $user_id->delete();
    }
}
