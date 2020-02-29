<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('branch_name')->unique();

            $table->boolean('is_active');
            $table->boolean('is_approved');
            $table->boolean('is_deleted');

            $table->dateTime('created_at');
            $table->dateTime('modified_at')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });

        $date = Carbon::now();

        DB::table('branch')->insert([
            'branch_name' => 'General',
            'is_active' => true,
            'is_approved' => true,
            'is_deleted' => false,
            'created_at' => $date,
            'approved_at' => $date
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch');
    }
}
