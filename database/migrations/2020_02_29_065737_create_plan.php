<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('plan_name');
            $table->timestamps();
        });

        DB::table('plan')->insert([
            'plan_name' => 'Pro',
            'created_at' => Carbon::now()
        ]);

        DB::table('plan')->insert([
            'plan_name' => 'Premium',
            'created_at' => Carbon::now()
        ]);

        DB::table('plan')->insert([
            'plan_name' => 'Enterprise',
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan');
    }
}
