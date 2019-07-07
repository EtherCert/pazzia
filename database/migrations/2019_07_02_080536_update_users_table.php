<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->date('birthday')->after('remember_token')->nullable();
            $table->string('avatar')->after('birthday')->nullable();
            $table->string('country')->after('avatar')->nullable();
            $table->string('username')->after('country')->nullable();
            $table->string('lastname')->after('name')->nullable();
            // $table->renameColumn('name', 'firstname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birthday');
            $table->dropColumn('avatar');
            $table->dropColumn('country');
        });
    }
}
