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
        Schema::create('acct_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('acct_type_name')->unique();
            $table->string('acct_type_short_name');
            $table->string('acct_type_display_name');
        });

        DB::table('acct_type')->insert([
            'acct_type_name' => 'Cash',
            'acct_short_name' => 'CASH',
            'acct_type_display_name' => 'Cash'
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
