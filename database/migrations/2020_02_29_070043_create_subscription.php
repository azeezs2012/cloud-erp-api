<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('tenants');
            $table->smallInteger('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plan');
            $table->smallInteger('subscription_type_id')->unsigned();
            $table->foreign('subscription_type_id')->references('id')->on('subscription_type');
            $table->smallInteger('subscription_status_id')->unsigned();
            $table->foreign('subscription_status_id')->references('id')->on('subscription_status');

            $table->dateTime('created_at');
            $table->dateTime('started_on');
            $table->dateTime('last_renewed_on')->nullable();
            $table->dateTime('end_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription');
    }
}
