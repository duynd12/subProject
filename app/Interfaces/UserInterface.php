<?php

namespace App\Interfaces;

use App\Models\User;

interface UserInterface
{
    public function getAll();
    public function getUserWithPaginator($quantity, $key);
    public function getCountUser();
    public function deleteUser($userId);
}
