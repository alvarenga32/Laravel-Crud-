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


    public function index(){

            $users = $this->service->findAll();

            return view("users/index", compact('users'));
    }

    public function create(Request $request){

        try{

            return response()->json($this->service->create($request->all()),201);
        
        } catch(Exception $e){

            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function update($id,Request $request){

        try{
            
            return response()->json($this->service->update($id,$request->all()),200);
        
        } catch(Exception $e){

            return response()->json(['error' => $e->getMessage()], 422);
        }
    }


    public function delete($id){

        try{

            return response()->json($this->service->delete($id),200);

        } catch( Exception $e){

            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
}
