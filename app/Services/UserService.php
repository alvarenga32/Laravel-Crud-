<?php

namespace App\Services;

use App\Helper\ValidationHelper;
use App\Repository\UserRepository;
use Exception;
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

        if(empty($id) || $id == ''){
            throw new Exception('Id informado nao encontrado');
        }

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

        $errors = ValidationHelper::validateRequest($request->all(), [
            "name"     => "required",
            "email"    => "email",
            "password" => "required|string"
        ]);

        if(!empty($errors)){
            return new Exception($errors);
        }

        $request['password'] = bcrypt($request['password']);

        return $this->repository->create([
            "name"     => $request["name"],
            "email"    => $request["email"],
            "password" => $request["password"],
        ]);
    }

    public function update($id,$request){

        $errors = ValidationHelper::validateRequest($request->all(), [
            "name"     => "required",
            "email"    => "email",
        ]);

        if(!empty($errors)){
            return new Exception($errors);
        }

        $user = $this->findById($id);

        if(!$user){
            return new Exception("Usuario informado nao foi localizado");
        }

        return $this->repository->update($user,$request);
    }

    public function delete($id){

        $user = $this->findById($id);

        if(!$user){
            throw new Exception("Usuario informado nao foi localizado");
        }

        return $this->repository->delete($user);
    }
}