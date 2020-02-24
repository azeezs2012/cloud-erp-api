<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Stancl\Tenancy\Exceptions\DomainsOccupiedByOtherTenantException;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    function createTenant(TenantRequest $request){
        try{
            $domain_name = $request->input('tenant_name') . "." . config('pas.domain_name');
            $domains = [$domain_name];
            $date = Carbon::now();
            $date->addDays(30);
            $tenant = \Tenant::create($domains, [
                'plan' => $request->input('plan'),
                'email' => $request->input('email'),
                'valid_till' => $date
            ]);
            \Artisan::call('tenants:migrate', [
                '--tenants' => [$tenant->id]
            ]);
            $response =  APIHelpers::createAPIResponse(false,201,'Tenant created successfully',$tenant);
            return response()->json($response,201);
        }catch (DomainsOccupiedByOtherTenantException $exception){
            $response =  APIHelpers::createAPIResponse(true,400,'One or more of the tenant\'s domains are already occupied by another tenant',null);
            return response()->json($response,400);
        }
    }


}
