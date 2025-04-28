<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserInterface
{
    /**
     * Busca User por id
     */
    public function findById($id): User | Collection;

    /**
     * Busca todos os Users cadastrados
     */
    public function findAll(): User | Collection;

    /**
     * Cria um novo User
     */
    public function create($fillable): User;

    /**
     * Atualiza um User existente
     */
    public function update($user,$fillable): bool;

    /**
     * Deleta um User
     */
    public function delete($id): bool;
}