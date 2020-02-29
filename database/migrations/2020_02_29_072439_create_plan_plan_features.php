<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanPlanFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_plan_features', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->smallInteger('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plan');
            $table->smallInteger('plan_feature_id')->unsigned();
            $table->foreign('plan_feature_id')->references('id')->on('plan_features');

            $table->timestamps();
        });

        DB::table('plan_plan_features')->insert([
            'plan_id' => 1,
            'plan_feature_id' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_plan_features')->insert([
            'plan_id' => 1,
            'plan_feature_id' => 2,
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_plan_features')->insert([
            'plan_id' => 1,
            'plan_feature_id' => 3,
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_plan_features')->insert([
            'plan_id' => 2,
            'plan_feature_id' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_plan_features')->insert([
            'plan_id' => 2,
            'plan_feature_id' => 2,
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_plan_features')->insert([
            'plan_id' => 3,
            'plan_feature_id' => 3,
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_plan_features')->insert([
            'plan_id' => 3,
            'plan_feature_id' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_plan_features')->insert([
            'plan_id' => 3,
            'plan_feature_id' => 2,
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_plan_features')->insert([
            'plan_id' => 3,
            'plan_feature_id' => 3,
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
        Schema::dropIfExists('plan_plan_features');
    }
}
