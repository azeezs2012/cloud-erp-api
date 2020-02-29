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
            'acct_type_short_name' => 'CASH',
            'acct_type_display_name' => 'Cash'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Bank',
            'acct_type_short_name' => 'BANK',
            'acct_type_display_name' => 'Bank'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Accounts Receivable',
            'acct_type_short_name' => 'AR',
            'acct_type_display_name' => 'Accounts Receivable'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Other Current Asset',
            'acct_type_short_name' => 'OC_ASSET',
            'acct_type_display_name' => 'Other Current Asset'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Fix Asset',
            'acct_type_short_name' => 'FIX_ASSET',
            'acct_type_display_name' => 'Fix Asset'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Other Asset',
            'acct_type_short_name' => 'O_ASSET',
            'acct_type_display_name' => 'Other Asset'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Equity',
            'acct_type_short_name' => 'EQUITY',
            'acct_type_display_name' => 'Equity'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Other Current Liability',
            'acct_type_short_name' => 'OC_LIABILITY',
            'acct_type_display_name' => 'Other Current Liability'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Long Term Liability',
            'acct_type_short_name' => 'LT_LIABILITY',
            'acct_type_display_name' => 'Long Term Liability'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Income',
            'acct_type_short_name' => 'INC',
            'acct_type_display_name' => 'Income'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Cost of Goods Sold',
            'acct_type_short_name' => 'COGS',
            'acct_type_display_name' => 'Cost of Goods Sold'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Expense',
            'acct_type_short_name' => 'EXP',
            'acct_type_display_name' => 'Expense'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Other Income',
            'acct_type_short_name' => 'EX_INC',
            'acct_type_display_name' => 'Other Income'
        ]);
        DB::table('acct_type')->insert([
            'acct_type_name' => 'Other Expense',
            'acct_type_short_name' => 'EX_EXP',
            'acct_type_display_name' => 'Other Expense'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acct_type');
    }
}
