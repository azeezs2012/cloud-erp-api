<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanFreatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_features', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('plan_features_name');

            $table->timestamps();
        });

        DB::table('plan_features')->insert([
            'plan_features_name' => 'AR Module',
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_features')->insert([
            'plan_features_name' => 'AP Module',
            'created_at' => Carbon::now()
        ]);

        DB::table('plan_features')->insert([
            'plan_features_name' => 'Banking Module',
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
        Schema::dropIfExists('plan_features');
    }
}
