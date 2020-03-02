<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleModel extends Model
{
    protected $table = "module";
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'module_name',
        'created_at',
        'updated_at'
    ];

}
