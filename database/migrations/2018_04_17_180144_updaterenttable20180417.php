<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Updaterenttable20180417 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('renting_places', 'apartment_name'))
        {
            Schema::table('renting_places', function (Blueprint $table) {
                $table->string('apartment_name')->nullable()->after('user_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn('renting_places', 'apartment_name'))
        {
            Schema::table('renting_places', function (Blueprint $table) {
                $table->drop('apartment_name');
            });
        }
    }
}
