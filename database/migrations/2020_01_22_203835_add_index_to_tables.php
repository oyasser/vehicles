<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('vehicles', function (Blueprint $table) {
//
//            $table->index(['id','name', 'plate_number']);
//
//        });
//
//        Schema::table('fuel_entries', function (Blueprint $table) {
//
//            $table->index(['cost', 'entry_date']);
//
//        });
//
//        Schema::table('insurance_payments', function (Blueprint $table) {
//
//            $table->index(['contract_date', 'amount']);
//
//        });
//
//        Schema::table('services', function (Blueprint $table) {
//
//            $table->index(['created_at', 'total']);
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
}
