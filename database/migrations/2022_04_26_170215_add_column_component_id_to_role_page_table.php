<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnComponentIdToRolePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_page', function (Blueprint $table) {
            $table->foreignId('component_id')->constrained('components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_page', function (Blueprint $table) {
            $table->dropForeign(['component_id']);
            $table->dropColumn('component_id');
        });
    }
}
