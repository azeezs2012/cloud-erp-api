<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('account_type_name')->unique();
            $table->string('account_type_display_name');
        });

        DB::table('account_type')->insert([
            'account_type_name' => 'Cash',
            'account_type_display_name' => 'Cash'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_type');
    }
}
