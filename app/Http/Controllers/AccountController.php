<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AccountTypeModel;

class AccountController extends Controller
{
    function insertAccount(Request $request){
        DB::insert("insert into account_type
        (account_type_name, account_type_display_name) values (?,?)",
        [$request->username,$request->username]);
    }

    function getAccountTypes(Request $request){
        //dd($request);
        return response()->json(AccountTypeModel::get(),200);
        //return "=======================";
    }
}
