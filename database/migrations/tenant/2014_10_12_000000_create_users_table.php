<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $timestamps = false;

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->boolean('is_active');
            $table->boolean('is_approved');

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('modified_at')->nullable();
            $table->dateTime('approved_at')->nullable();
        });

        $date_time = Carbon::now();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
            'is_active' => 1,
            'is_approved' => 1,
            'created_at' => $date_time->copy(),
            'updated_at' => $date_time->copy(),
            'approved_at' => $date_time->copy()
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
