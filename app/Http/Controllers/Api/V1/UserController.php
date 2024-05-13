<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        // Implemente a lógica para listar os usuários, se necessário
        $users = $this->userService->getAllUsers();

        return UserResource::collection($users);
    }

    public function create()
    {
        // Implemente a lógica para exibir o formulário de criação de usuário, se necessário
    }

    public function store(Request $request)
    {
        // Implemente a lógica para armazenar um novo usuário com base nos dados da requisição
    }

    public function show(string $id)
    {
        return new UserResource($this->userService->getUserById($id));
    }

    public function edit(string $id)
    {
        // Implemente a lógica para exibir o formulário de edição de usuário, se necessário
    }

    public function update(Request $request, string $id)
    {
        // Implemente a lógica para atualizar os dados de um usuário com base nos dados da requisição
    }

    public function destroy(string $id)
    {
        // Implemente a lógica para excluir um usuário
    }
}
