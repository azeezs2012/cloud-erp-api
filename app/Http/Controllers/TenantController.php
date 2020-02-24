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
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedException;
use Stancl\Tenancy\Exceptions\TenantDoesNotExistException;

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

    function getTenants(Request $request){
        $response =  APIHelpers::createAPIResponse(false,200,null,tenancy()->all());
        return response()->json($response,200);
    }

    function getTenantById(Request $request, $id){
        try {
            $tenants = tenancy()->find($id);
            $response =  APIHelpers::createAPIResponse(false,200,null,$tenants);
            return response()->json($response,200);
        } catch (TenantCouldNotBeIdentifiedException $e) {
            $response =  APIHelpers::createAPIResponse(true,400,$e->getMessage(),null);
            return response()->json($response,$e->getCode());
        } catch (TenantDoesNotExistException $e2){
            $response =  APIHelpers::createAPIResponse(true,400,$e2->getMessage(),null);
            return response()->json($response,400);
        }
    }

    function getTenantByDomain(Request $request, $domain){
        try {
            $tenants = tenancy()->findByDomain($domain);
            $response =  APIHelpers::createAPIResponse(false,200,null,$tenants);
            return response()->json($response,200);
        } catch (TenantCouldNotBeIdentifiedException $e1) {
            $response =  APIHelpers::createAPIResponse(true,400,$e1->getMessage(),null);
            return response()->json($response,$e1->getCode());
        } catch (TenantDoesNotExistException $e2){
            $response =  APIHelpers::createAPIResponse(true,400,$e2->getMessage(),null);
            return response()->json($response,400);
        }
    }


}
