<?php

namespace App\Http\Controllers\ListControllers;

use App\Helpers\APIHelpers;
use App\Http\Controllers\Controller;
use App\Models\ListModels\AccountTypeModel;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function getAccountTypes(Request $request){
        $response =  APIHelpers::createAPIResponse(false,200,null,AccountTypeModel::get());
        return response()->json($response,200);
    }
}
