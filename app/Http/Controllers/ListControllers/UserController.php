<?php

namespace App\Http\Controllers\Listcontrollers;

use App\Helpers\APIHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\ListModels\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function getUsers(UserRequest $request){
        $response = APIHelpers::createAPIResponse(false,200,null,User::get());
        return response()->json($response,200);
    }

    function createUser(UserRequest $request){
        $user = new User();
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->remember_token = sha1($user->password);
        $user->is_active = $request->input('is_active');
        $user->is_approved = $request->input('is_approved');
        $user->created_at = Carbon::now();
        if($request->input('is_approved')){
            $user->approved_at = Carbon::now();
        }
        if(is_null(User::where('username',$user->username)->first())){
            $user->save();
            $response =  APIHelpers::createAPIResponse(false,400,'username created successfully',$user);
            return response()->json($response,400);
        }
        else{
            $response =  APIHelpers::createAPIResponse(true,400,'username already exist',null);
            return response()->json($response,400);
        }
    }
}
