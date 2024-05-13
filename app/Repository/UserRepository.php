<?php

namespace App\Repository;

use App\Models\User;


class UserRepository
{
  public function  getById($userId)
  {

    return User::find($userId);
  }

  public function getByEmail($email)
  {
    return User::where('email', $email)->first();
  }

  public function create($userData)
  {
    return User::create($userData);
  }

  public function getAllUsers()
  {
    return User::all();
  }
}
