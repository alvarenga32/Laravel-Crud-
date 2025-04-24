<?php

namespace App\Repository;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserInterface
{
    public function findById($id): User{
        return User::find($id);
    }

    public function findAll(): User{
        return User::all();
    }

    public function create($fillable): User{
        return User::create([$fillable]);
    }

    public function update($user,$fillable): bool{
        return $user::update([$fillable]);
    }

    public function delete($user): bool{
        return $user::destroy();
    }
}