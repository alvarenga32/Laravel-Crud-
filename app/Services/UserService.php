<?php

namespace App\Services;

use App\Helper\ValidationHelper;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserService 
{
    private $repository;

    public function __construct(
        UserRepository $userrepository
    ){
        $this->repository = $userrepository;
    }

    public function findById($id){
        return $this->repository->findById($id);
    }

    public function findAll(){
        
        $users = $this->repository->findAll();

        if(empty($users)){
            return ['error' => 'Nao foi encontrado nenhum User ate o momento'];
        }

        return $users;
    }

    public function create($request){
        return $this->repository->create($request);
    }

    public function update($user,$request){
        return $this->repository->update($user,$request);
    }

    public function delete($user){
        return $this->repository->delete($user);
    }
}