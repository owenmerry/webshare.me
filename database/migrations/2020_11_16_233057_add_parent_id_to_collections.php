<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdToCollections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // collection
        Schema::table('collections', function (Blueprint $table) {
            //add
            $table->integer('parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // collection
        Schema::table('collections', function (Blueprint $table) {
            //remove
            $table->dropColumn('parent_id');
        });
    }
}
