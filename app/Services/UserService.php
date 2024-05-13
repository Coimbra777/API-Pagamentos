<?php

namespace App\Services;

use App\Repository\UserRepository;

class UserService
{
  protected $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function createUser($userData)
  {
    // Aqui você pode adicionar lógica de validação, processamento adicional, etc.
    return $this->userRepository->create($userData);
  }

  public function getUserById($userId)
  {
    return $this->userRepository->getById($userId);
  }

  public function getUserByEmail($email)
  {
    return $this->userRepository->getByEmail($email);
  }

  public function getAllUsers()
  {
    return $this->userRepository->getAllUsers();
  }
  // Outros métodos de lógica de negócios relacionados aos usuários podem ser adicionados conforme necessário
}
