<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleSubscription extends Model
{
    protected $table = "module_subscription";
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'module_id',
        'subscription_id'
    ];
}
