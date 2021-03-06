<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('subscription_type_name');
        });

        DB::table('subscription_type')->insert([
            'subscription_type_name' => 'Month Basis'
        ]);

        DB::table('subscription_type')->insert([
            'subscription_type_name' => 'Annual Basis'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_type');
    }
}
