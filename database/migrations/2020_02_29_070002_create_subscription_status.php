<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_status', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('subscription_status_name');
        });

        DB::table('subscription_status')->insert([
            'subscription_status_name' => 'Active'
        ]);

        DB::table('subscription_status')->insert([
            'subscription_status_name' => 'Inactive'
        ]);

        DB::table('subscription_status')->insert([
            'subscription_status_name' => 'Terminated'
        ]);

        DB::table('subscription_status')->insert([
            'subscription_status_name' => 'Hold'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_status');
    }
}
