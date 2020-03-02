<?php

namespace App\Http\Controllers\Listcontrollers;

use App\Helpers\APIHelpers;
use App\Http\Controllers\Controller;
use App\Models\ListModels\BranchModel;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    function getBranches(Request $request){
        $response = APIHelpers::createAPIResponse(false,200,null,BranchModel::get());
        return response()->json($response,200);
    }


}
