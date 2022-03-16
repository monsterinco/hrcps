<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileIdToSubsistenceAllowance2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subsistence_allowance', function (Blueprint $table) {
            $table->text('profile_id')
                    ->after('id')
                    ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subsistence_allowance', function (Blueprint $table) {
            $table->dropColumn('profile_id');
        });
    }
}
