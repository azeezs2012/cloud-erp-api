<?php

namespace App\Models\ListModels;

use Illuminate\Database\Eloquent\Model;

class BranchModel extends Model
{
    protected $table = "branch";
    protected $primaryKey = "id";

    protected $fillable =[
        'id',
        'branch_name',
        'is_active',
        'is_approved',
        'is_deleted',
        'created_at',
        'modified_at',
        'approved_at',
        'deleted_at'
    ];
}
