<?php

namespace App\Http\Controllers;

use App\Helper\ValidationHelper;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $service;

    public function __construct(
        UserService $userService
    ){
        $this->service = $userService;
    }

    private $rulesUpdate = [
        "name"     => "required",
        "email"    => "email",
    ];

    public function findById($id){

        try{

            if(empty($id) || $id == ''){
                throw new Exception('Id informado nao encontrado');
            }

            return response()->json($this->service->findById($id),200);

        } catch( Exception $e){

            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function findAll(){

        try{

            return response()->json($this->service->findAll(),200);

        } catch( Exception $e){

            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function create(Request $request){

        try{

            $errors = ValidationHelper::validateRequest($request, [
                "name"     => "required",
                "email"    => "email",
                "password" => "required|string"
            ]);

            if(!empty($errors)){
                throw new Exception($errors);
            }

            return response()->json($this->service->create($request->all()),201);
        
        } catch(Exception $e){

            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function update($id,Request $request){

        try{

            $errors = ValidationHelper::validateRequest($request, [
                "name"     => "required",
                "email"    => "email",
            ]);

            if(!empty($errors)){
                throw new Exception($errors);
            }

            $user = $this->service->findById($id);

            if(!$user){
                throw new Exception("Usuario informado nao foi localizado");
            }
            
            return response()->json($this->service->update($user,$request->all()),200);
        
        } catch(Exception $e){

            return response()->json(['error' => $e->getMessage()], 422);
        }
    }


    public function delete($id){

        try{

            $user = $this->service->findById($id);

            if(!$user){
                throw new Exception("Usuario informado nao foi localizado");
            }

            return response()->json($this->service->delete($user),200);

        } catch( Exception $e){

            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
}
