<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('module_name');
            $table->timestamps();
        });

        DB::table('module')->insert([
            'module_name' => 'AR',
            'created_at' => Carbon::now()
        ]);

        DB::table('module')->insert([
            'module_name' => 'AP',
            'created_at' => Carbon::now()
        ]);

        DB::table('module')->insert([
            'module_name' => 'CRM',
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
        Schema::dropIfExists('module');
    }
}
