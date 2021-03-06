<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use App\Models\ModuleModel;
use App\Models\SubscriptionModel;
use App\Models\SubscriptionTypeModel;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Stancl\Tenancy\Exceptions\DomainsOccupiedByOtherTenantException;
use Illuminate\Support\Facades\Validator;
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedException;
use Stancl\Tenancy\Exceptions\TenantDoesNotExistException;

class TenantController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    function createTenant(TenantRequest $request){
        try{
            $domain_name = $request->input('tenant_name') . "." . config('pas.domain_name');
            $domains = [$domain_name];

            $tenant = \Tenant::create($domains, [
                'email' => $request->input('email')
            ]);
            /*\Artisan::call('tenants:migrate', [
                '--tenants' => [$tenant->id]
            ]);*/
            $subscription = new SubscriptionModel();
            $subscription->tenant_id = $tenant->id;
            $subscription->subscription_type_id = $request->input('subscription_type_id');
            $subscription->subscription_status_id = $request->input('subscription_status_id');
            $subscription->created_at = Carbon::now();
            $subscription->started_on = Carbon::now();
            $subscription->last_renewed_on = null;
            if(SubscriptionTypeModel::find($subscription->subscription_type_id)->subscription_type_name=='Month Basis'){
                $subscription->end_on = Carbon::now()->addDays(30);
            }
            else if(SubscriptionTypeModel::find($subscription->subscription_type_id)->subscription_type_name=='Annual Basis'){
                $subscription->end_on = Carbon::now()->addDays(360);
            }
            $subscription->save();
            $subscription->Modules()->saveMany(ModuleModel::all());
            $subscription->modules = $subscription->Modules()->allRelatedIds();
            $response =  APIHelpers::createAPIResponse(false,201,'Tenant created successfully',[$tenant,$subscription]);
            return response()->json($response,201);
        }catch (DomainsOccupiedByOtherTenantException $exception){
            $response =  APIHelpers::createAPIResponse(true,400,$exception->getMessage(),null);
            return response()->json($response,400);
        }
    }

    function getTenants(TenantRequest $request){
        $response =  APIHelpers::createAPIResponse(false,200,null,tenancy()->all());
        return response()->json($response,200);
    }

    function getTenantById(TenantRequest $request, $id){
        try {
            $tenants = tenancy()->find($id);
            $response =  APIHelpers::createAPIResponse(false,200,null,$tenants);
            return response()->json($response,200);
        } catch (TenantCouldNotBeIdentifiedException $e) {
            $response =  APIHelpers::createAPIResponse(true,400,$e->getMessage(),null);
            return response()->json($response,400);
        } catch (TenantDoesNotExistException $e2){
            $response =  APIHelpers::createAPIResponse(true,400,$e2->getMessage(),null);
            return response()->json($response,400);
        }
    }

    function getTenantByDomain(TenantRequest $request, $domain){
        try {
            $tenants = tenancy()->findByDomain($domain);
            $response =  APIHelpers::createAPIResponse(false,200,null,$tenants);
            return response()->json($response,200);
        } catch (TenantCouldNotBeIdentifiedException $e1) {
            $response =  APIHelpers::createAPIResponse(true,400,$e1->getMessage(),null);
            return response()->json($response,400);
        } catch (TenantDoesNotExistException $e2){
            $response =  APIHelpers::createAPIResponse(true,400,$e2->getMessage(),null);
            return response()->json($response,400);
        }
    }

    function deleteTenant(TenantRequest $request, $id){
        try {
            $tenant = tenancy()->find($id);
            if(!is_null($tenant)){
                $tenant->delete();
                $response =  APIHelpers::createAPIResponse(false,200,'Tenant deleted successfully',null);
                return response()->json($response,200);
            }
            else{
                $response =  APIHelpers::createAPIResponse(true,400,'Could not find tenant',null);
                return response()->json($response,400);
            }
        } catch (TenantCouldNotBeIdentifiedException $e) {
            $response =  APIHelpers::createAPIResponse(true,400,$e->getMessage(),null);
            return response()->json($response,400);
        }
    }

    function updateTenant(TenantRequest $request, $id){
        try {
            $date = Carbon::now();
            $date->addDays(30);
            $tenant = tenancy()->find($id);
            $tenant->data['valid_till'] = $date;
            $tenant->data['plan'] = $request->input('plan');
            $tenant->save();
            $response = APIHelpers::createAPIResponse(false, 201, 'Tenant updated successfully', $tenant);
            return response()->json($response, 201);
        }catch(TenantCouldNotBeIdentifiedException $e1) {
            $response =  APIHelpers::createAPIResponse(true,400,$e1->getMessage(),null);
            return response()->json($response,400);
        }
    }

    function migrateAllTenants(TenantRequest $request){
        $tenants = tenancy()->all();
        foreach ($tenants as $tenant){
            \Artisan::call('tenants:migrate', [
                '--tenants' => [$tenant->id]
            ]);
        }
        $response = APIHelpers::createAPIResponse(false, 200, 'Tenant databases migrated successfully', null);
        return response()->json($response, 200);
    }

    function migrateTenant(TenantRequest $request, $id){

        try {
            $tenant = tenancy()->find($id);
            if(!is_null($tenant)){
                \Artisan::call('tenants:migrate', [
                    '--tenants' => [$tenant->id]
                ]);
                $response = APIHelpers::createAPIResponse(false, 200, 'Tenant database migrated successfully', $tenant);
                return response()->json($response, 200);
            }
            else{
                $response =  APIHelpers::createAPIResponse(true,400,'Could not find tenant',null);
                return response()->json($response,400);
            }
        } catch (TenantCouldNotBeIdentifiedException $e) {
            $response =  APIHelpers::createAPIResponse(true,400,$e->getMessage(),null);
            return response()->json($response,400);
        }
    }
}
