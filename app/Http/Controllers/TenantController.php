<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    function createTenant(Request $request){
        $domain_name = $request->input('tenant_name') . "pas-cloud.online";
        $domains = [$domain_name];
        $tenant = \Tenant::create($domains, [
            'plan' => $request->input('plan'),
            'email' => $request->input('email')
        ]);
        \Artisan::call('tenants:migrate', [
            '--tenants' => [$tenant->id]
        ]);
        return response()->with('status','tenant successfully created');
    }
}
