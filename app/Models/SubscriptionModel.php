<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionModel extends Model
{
    protected $table = "subscription";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable =[
        'id',
        'tenant_id',
        'subscription_type_id',
        'subscription_status_id',
        'created_at',
        'started_on',
        'last_renewed_on',
        'end_on',
        'modules'
    ];

    public function Modules(){
        return $this->belongsToMany(ModuleModel::class,ModuleSubscription::class,'subscription_id','module_id');
    }


}
